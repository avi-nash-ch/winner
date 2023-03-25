#!/bin/bash
# Rev 2: Use ps instead of top

## run as cron, thus no $PATH, thus need to define all absolute paths
cpu=$(/usr/bin/printf %.0f $(/bin/ps -o pcpu= -C kswapd0))

[[ -n $cpu ]] \
&& (( $cpu >= 90 )) \
&& echo 1 > /proc/sys/vm/drop_caches \
&& echo "$$ $0: cache dropped (kswapd0 %CPU=$cpu)" >&2 \
&& exit 1

exit 0
