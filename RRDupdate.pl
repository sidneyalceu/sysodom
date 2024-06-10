#!/usr/bin/bash

TIME=`date +%s`
vmstat 1 300 | awk -v time=$TIME '/^.[0-9]/{ n++; print "rrdtool update vmstat.rrd "time+n":" $1 ":" $2 ":" $3 ":" $4 ":" $5 ":" $6 ":" $7 ":" $8 ":" $9 ":" $10 ":" $11 ":" $12 ":" $13 ":" $14 ":" $15 ":" $16 ":" $17 ":" $18 ":" $19 }' >vmstat.output
ENDTIME=`date +%s`

rrdtool graph physical_consumed.gif \
--title "Physical CPU Consumed" \
--vertical-label "CPUs" \
--height 300 \
--start $TIME \
--end $ENDTIME \
DEF:pc=vmstat.rrd:pc:AVERAGE LINE2:pc#00FF00:"Physical Consumed"

rrdtool graph cpu_utilisation.gif \
--rigid --lower-limit 0 --upper-limit 100 \
--title "CPU Utilisation" \
--vertical-label "Percent Stacked" \
--start $TIME \
--end $ENDTIME \
--height 300 \
DEF:us=vmstat.rrd:us:AVERAGE AREA:us#00FF00:"User" \
DEF:sy=vmstat.rrd:sy:AVERAGE STACK:sy#0000FF:"System" \
DEF:wa=vmstat.rrd:wa:AVERAGE STACK:wa#FF0000:"Wait" \
DEF:id=vmstat.rrd:id:AVERAGE STACK:id#FFFFFF:"Idle"
