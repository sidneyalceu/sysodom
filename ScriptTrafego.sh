#!/usr/bin/bash

export SECONDS=300
echo this script captures for $SECONDS seconds

echo remove the memoria.rrd database in this directory
rm memoria.rrd

echo  create memoria.rrd for 10000 seconds = over 27 hours max at 1 second captures


RRDs::create "$rrd/$_[0].rrd",
	"-s", "300",
	"DS:in:DERIVE:600:0:U",
	"DS:out:DERIVE:600:0:U",
	"RRA:AVERAGE:0.5:1:576",
	"RRA:AVERAGE:0.5:6:672",
	"RRA:AVERAGE:0.5:24:732",
	"RRA:AVERAGE:0.5:144:1460";

rrdtool create memoria.rrd --step 1  \
DS:total:GAUGE:5:U:U \
DS:free:GAUGE:5:U:U \
DS:usage:GAUGE:5:U:U \
DS:user:GAUGE:5:U:U \
RRA:AVERAGE:0.5:1:100000

let i=1
TIME=`date +%s`
XTIME=$TIME
rm memoria.output

for i in $(seq $SECONDS)
do
 IFOUTOCTETS=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.2.0 | awk '{ gsub("\"",""); print $1 }'`
 IFINOCTETS=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.3.0 | awk '{ gsub("\"",""); print $1 }'`

 echo "rrdtool update memoria.rrd "$XTIME":"$TOTAL":"$FREE":"$USAGE":"$USER >> memoria.output
 echo $i "rrdtool update memoria.rrd "$XTIME":"$TOTAL":"$FREE":"$USAGE":"$USER
 
 XTIME=$(($XTIME + 1))

 sleep 1
 let i++
 
done

ENDTIME=$XTIME

echo load the memoria data into the memoria.rrd database
echo the file has `wc -l memoria.output` lines
ksh <./memoria.output

echo graph the data

rrdtool graph example.png \
DEF:obs=monitor.rrd:ifOutOctets:AVERAGE \
DEF:pred=monitor.rrd:ifOutOctets:HWPREDICT \
DEF:dev=monitor.rrd:ifOutOctets:DEVPREDICT \
DEF:fail=monitor.rrd:ifOutOctets:FAILURES \
TICK:fail#ffffa0:1.0:"Failures\: Average bits out" \
CDEF:scaledobs=obs,8,* \
CDEF:upper=pred,dev,2,*,+ \
CDEF:lower=pred,dev,2,*,- \
CDEF:scaledupper=upper,8,* \
CDEF:scaledlower=lower,8,* \
LINE2:scaledobs#0000ff:"Average bits out" \
LINE1:scaledupper#ff0000:"Upper Confidence Bound: Average bits out" \
LINE1:scaledlower#ff0000:"Lower Confidence Bound: Average bits out"


rrdtool graph trafego.png \
DEF:in=trafego.rrd:in:AVERAGE \
DEF:maxin=trafego.rrd:in:MAX \
DEF:out=trafego.rrd:out:AVERAGE \
DEF:maxout=trafego.rrd:out:MAX \
CDEF:out_neg=out,-1,* \
CDEF:maxout_neg=maxout,-1,* \
AREA:in#32CD32:Incoming \
LINE1:maxin#336600 \
GPRINT:in:MAX:  Max\\: %6.1lf %s \
GPRINT:in:AVERAGE: Avg\\: %6.1lf %S \
GPRINT:in:LAST: Current\\: %6.1lf %SBytes/sec \
AREA:out_neg#4169E1:Outgoing \
LINE1:maxout_neg#0033CC \
GPRINT:maxout:MAX:  Max\\: %6. 1lf %S \
GPRINT:out:AVERAGE: Avg\\: %6.1lf %S \
GPRINT:out:LAST: Current\\: %6.1lf %SBytes/sec \
HRULE:0#000000

echo images available
ls -l *.gif

