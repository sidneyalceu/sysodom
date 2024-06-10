#! /usr/local/bin/perl
 
use strict;
use warnings;
 
use Net::SNMP;
 
my $OID_sysUpTime = '1.3.6.1.4.1.1916.1.2.1.2.1.1';
 
my ($session, $error) = Net::SNMP->session(
   -hostname  => shift || '10.7.4.1',
   -community => shift || 'publicaloo',
   -version => shift || '2',       
);
 
if (!defined $session) {
   printf "ERROR: %s.\n", $error;
   exit 1;
}
 
my $result = $session->get_bulk_request(-varbindlist => [ $OID_sysUpTime ],);
 
if (!defined $result) {
   printf "ERROR: %s.\n", $session->error();
   $session->close();
   exit 1;
}
 
printf "The sysUpTime for host '%s' is %s.\n",
       $session->hostname(), $result->{$OID_sysUpTime};
 
$session->close();
 
exit 0;
