PID=$(pidof kinsing)
echo "$PID"
kill -9 $PID
PID=$(pidof kinsing*)
echo "$PID"
kill -9 $PID
PID=$(pidof /tmp/kinsing)
echo "$PID"
kill -9 $PID
PID=$(pidof /tmp/kinsing*)
echo "$PID"
kill -9 $PID
PID=$(pidof kdevtmpfsi)
echo "$PID"
kill -9 $PID
PID=$(pidof kdevtmpfsi*)
echo "$PID"
kill -9 $PID
PID=$(pidof /tmp/kdevtmpfsi)
echo "$PID"
kill -9 $PID
PID=$(pidof /tmp/kdevtmpfsi*)
echo "$PID"
kill -9 $PID
find / -iname kdevtmpfsi -exec rm -fv {} \;
find / -iname kinsing -exec rm -fv {} \;