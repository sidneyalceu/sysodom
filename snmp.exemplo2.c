A seguir, é apresentado o código fonte de uma aplicação que faz a requisição a um objeto gerenciável, solicitando os valores associados a ele. As partes em destaque indicam funções específicas da API de programação providas pela ferramenta.

/* Estes sao os arquivos comumente incluidos */

#include <sys/types.h>
#include <sys/param.h>
#include <stdio.h>
#include <netinet/in.h>
#include <sys/time.h>
#include <errno.h>
#include <ctype.h>

#include "snmp.h"
#include "asn1.h"
#include "snmp_impl.h"
#include "snmp_api.h"
#include "snmp_client.h"

#define MAX_ENTRIES 10000

int snmp_dump_packet = 0;

typedef struct {

char *name;
char *val;

} entry;

char *makeword();
char *fmakeword();
char x2c();
void unescape_url();
void plustospace();

main(argc,argv)
int argc; char *argv[]; {

struct tt_prmtrs *param;
entry entries[MAX_ENTRIES];
register int x, aux,m=0;
int cl;

char data[100];
double length;
char *str_len;

/*** Estruturas utilizadas pelas funcoes do cmu-snmp. ***/

struct snmp_session session, *ss;
struct snmp_pdu *pdu, *response;
struct variable_list *vars;
oid name[MAX_NAME_LEN];
int name_length;
int status;
char desc[60], *auxs;
int i, j, k;

/*** Definicao do objeto a ser buscado ***/

char maquina[100];
char comunidade[100];
char nome[200];

printf("Content-type: text/html%c%c",10,10);

printf("<title>Teste SNMP</title>");
printf("<BODY BGCOLOR=\"#c0dcc0\" TEXT=\"#150517\" LINK=\"#EF0000\" >");
printf("<h2><center>Teste SNMP</center></h2>"); printf("<HTML><BODY>");
cl = atoi(getenv("CONTENT_LENGTH"));

for (x=0; cl && (!feof(stdin)); x++) {

entries[x].val = fmakeword(stdin,'&',&cl);
plustospace(entries[x].val);
unescape_url(entries[x].val); entries[x].name = makeword(entries[x].val,'='); m=x;

}

strcpy(maquina, entries[0].val);
strcpy(comunidade, entries[1].val);
strcpy(nome,entries[2].val);

/*** Inicializacao da MIB e inicializa estrutura ***/

init_mib();

bzero((char *)&session, sizeof(struct snmp_session));

session.peername = maquina;
session.version = SNMP_VERSION_1;
session.community = (u_char *)comunidade;
session.community_len = strlen((char *)comunidade);
session.retries = SNMP_DEFAULT_RETRIES;
session.timeout = SNMP_DEFAULT_TIMEOUT;
session.authenticator = NULL;

/*** Sincroniza a sessao snmp ***/

snmp_synch_setup(&session);

ss = snmp_open(&session);

if (ss == NULL)

printf("Nao conseguiu abrir sessao\n"); return NULL;

/*** Cria a PDU e coloca os objetos que serao buscados Podem ser colocados varios objetos na mesma PDU. Basta se repetir as funcoes read_objid e snmp_add_null_var ***/

pdu = snmp_pdu_create(GET_REQ_MSG);
name_length = MAX_NAME_LEN;

if (!read_objid(nome, name, &name_length)) {

printf("Objeto inexistente: %s", nome);
exit(1);

}

snmp_add_null_var(pdu, name, name_length);

status = snmp_synch_response(ss, pdu, &response);
if(status == STAT_SUCCESS) {

if(response->errstat == SNMP_ERR_NOERROR) {

vars = response->variables;
sprint_variable(desc,vars->name, vars->name_length, vars);
auxs=index(desc,'=');
auxs++; if (auxs) strcpy(desc, auxs);

} else printf("Erro no pacote: %s\n",snmp_errstring(response->errstat));

} else

if (status == STAT_TIMEOUT)

printf("Sem resposta - %s\n", maquina);

else

/* status == STAT_ERROR */ printf("An error occurred, Quitting\n");

if (response)

snmp_free_pdu(response);

printf("<hr><P>Endereço da Máquina : %s ", maquina);
printf("<P>Nome da Comunidade : %s ", comunidade);
printf("<P>Objeto Gerenciável : %s ", nome);
printf("<P>RESULTADO : %s ",desc);

printf("<HR></BODY></HTML>\n");
snmp_close(ss);

}
