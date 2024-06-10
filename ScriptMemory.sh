#!/usr/bin/bash

export SECONDS=300
echo this script captures for $SECONDS seconds

echo remove the memoria.rrd database in this directory
rm memoria.rrd

echo  create memoria.rrd for 10000 seconds = over 27 hours max at 1 second captures

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
 TOTAL=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.2.0 | awk '{ gsub("\"",""); print $1 }'`
 FREE=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.3.0 | awk '{ gsub("\"",""); print $1 }'`
 USAGE=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.4.0 | awk '{ gsub("\"",""); print $1 }'`
 USER=`/usr/bin/snmpget -Ovq -v2c -c publicaloo 10.7.0.1 1.3.6.1.4.1.1916.1.32.2.2.1.5.0 | awk '{ gsub("\"",""); print $1 }'`
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

echo "rrdtool graph memoria.gif \
--rigid --lower-limit 0 --upper-limit 1200000 \
--title 'Memória Utilisation' \
--vertical-label 'Percent Stacked' \
--start" $TIME" \
--end "$ENDTIME" \
--height 300 \
DEF:total=memoria.rrd:total:AVERAGE AREA:total#00FF00:'Total' \
DEF:free=memoria.rrd:free:AVERAGE AREA:free#0000FF:'Free' \
DEF:usage=memoria.rrd:usage:AVERAGE AREA:usage#FF0000:'Usage' \
DEF:user=memoria.rrd:user:AVERAGE AREA:user#F7F78F:'User'
"
rrdtool graph memoria.gif \
--rigid --lower-limit 0 --upper-limit 1200000 \
--title "Memória Utilisation" \
--vertical-label "Percent Stacked" \
--start $TIME \
--end $ENDTIME \
--height 300 \
DEF:total=memoria.rrd:total:AVERAGE AREA:total#00FF00:"Total" \
DEF:free=memoria.rrd:free:AVERAGE STACK:free#0000FF:"Free" \
DEF:usage=memoria.rrd:usage:AVERAGE STACK:usage#FF0000:"Usage" \
DEF:user=memoria.rrd:user:AVERAGE STACK:user#FFFFFF:"User"

echo images available
ls -l *.gif

