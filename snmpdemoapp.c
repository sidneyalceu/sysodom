 #include <net-snmp/net-snmp-config.h>
 #include <net-snmp/net-snmp-includes.h>

 int main(int argc, char ** argv) {
	struct snmp_session session, *ss;
	struct snmp_pdu *pdu;
	struct snmp_pdu *response;
           
	oid anOID[MAX_OID_LEN];
	size_t anOID_len = MAX_OID_LEN;
	struct variable_list *vars;
	int status;

	init_snmp("snmpapp");
	snmp_sess_init( &session );                   /* set up defaults */
	session.peername = "10.7.1.1";
  
	session.version = SNMP_VERSION_1;
	session.community = "publicaloo";
	session.community_len = strlen(session.community);
   
	ss = snmp_open(&session);                     /* establish the session */

	if (!ss) {
		snmp_perror("ack");
		snmp_log(LOG_ERR, "something horrible happened!!!\n");
		exit(2);
	}

	pdu = snmp_pdu_create(SNMP_MSG_GET);
	read_objid(".1.3.6.1.2.1.1.7.0", anOID, &anOID_len);
	snmp_add_null_var(pdu, anOID, anOID_len);
	status = snmp_synch_response(ss, pdu, &response);
   
	if (status == STAT_SUCCESS && response->errstat == SNMP_ERR_NOERROR) {
		for(vars = response->variables; vars; vars = vars->next_variable) {
			int count=1;
			if (vars->type == ASN_INTEGER) {
				int valor = *vars->val.integer;
				printf("value %i is a string:\n", valor);
			}
			else
			printf("value #%d is NOT a string! Ack!\n", count++);
		}
	} else {
		if (status == STAT_SUCCESS)
			fprintf(stderr, "Error in packet\nReason: %s\n",
			snmp_errstring(response->errstat));
		else
			snmp_sess_perror("snmpget", ss);
   }

	if (response)
		snmp_free_pdu(response);
	snmp_close(ss);
}