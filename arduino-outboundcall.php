<?php
// Arduino Call
// Modified By: Dan Wagoner - www.nerdybynature.com
// Date: 08/31/09
// A script written to create a call for asterisk file when accessed. The
// original intent is to have an arduino connect, triggereing a phone call.

$remote_ip=$_SERVER["REMOTE_ADDR"];

// Change the values below to reflect your setup
$arduino_ip = "192.168.15.6";
$asterisk_outgoing = "/var/spool/asterisk/outgoing/";
$asterisk_tmp = "/tmp/";
$asterisk_toext = "703"; // the extension you want to call.
$asterisk_context = "arduino_call";
$asterisk_cid = "'Arduino' <000>"; // the from caller id you'd like to display.

if ($remote_ip == $arduino_ip){
        // create the file in a temp location
        $arduinocallfile = "/$asterisk_tmp/arduino_call.txt";
        $arduinocall = fopen($arduinocallfile, 'w') or die("can't open file");
        $arduinocall_data = "Channel: SIP/$asterisk_toext\nContext: $asterisk_context\nExtension: s\nCallerID: $asterisk_cid";
        fwrite($arduinocall, $arduinocall_data);
        fclose($arduinocall);

        // chmod, chown and chgrp the file to asterisk:asterisk
        chmod ("/$asterisk_tmp/arduino_call.txt", 0666);
        chown ("/$asterisk_tmp/arduino_call.txt", "asterisk");
        chgrp ("/$asterisk_tmp/arduino_call.txt", "asterisk");

        // move the file to /var/spool/asterisk/outgoing
        rename("/$asterisk_tmp/arduino_call.txt", "/$asterisk_outgoing/arduino_call.call");
}
else{
// The request didn't come from the Arduino...banished!
echo "unauthorized access";
}
?>