#!/bin/bash

# kinsing deleteing here
PID=$(pidof kinsing*)
echo "$PID"
kill -9 $PID


# /tmp/kinsing deleteing here (Some times it will run /tmp path)
PID=$(pidof /tmp/kinsing*)
echo "$PID"
kill -9 $PID

# kdevtmpfsi deleteing here
PID=$(pidof kdevtmpfsi)
echo "$PID"
kill -9 $PID

# kdevtmpfsi deleteing here
PID=$(pidof kdevtmpfsi*)
echo "$PID"
kill -9 $PID


# /tmp/kdevtmpfsi deleteing here (Some times it will run /tmp path)
PID=$(pidof /tmp/kdevtmpfsi*)
echo "$PID"
kill -9 $PID

# Delete malware files
find / -iname kdevtmpfsi -exec rm -fv {} \;

find / -iname kinsing -exec rm -fv {} \;
