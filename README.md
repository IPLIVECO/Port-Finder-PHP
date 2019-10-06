# Port-Finder-PHP
A simple script to scan for all open ports on a given IP

Use:
1: Upload portfind.php to public web directory
2: Call script with "ip" parameter

Example:
http://127.0.0.1/portfinder.php?ip=172.217.15.110

Notes:
Bad ports (not opened) will be placed in badports.txt
Good ports (open ones) will be placed in goodports.txt
