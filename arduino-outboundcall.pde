// arduino_call
// author: Dan Wagoner - www.nerdybynature.com
// date: 9/1/2010
// ===================================================================================
// a quick example sketch showing how an arduino can easily make outbound calls
// using a few scripts on an Asterisk PBX. this sketch waits for 3 seconds after
// starting and calls the script on the PBX over HTTP. this could easily be adapted
// to be triggered by any number of devices/sensors/variables.

#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte ip[] = { 192, 168, 15, 6 }; // Arduino IP (be sure to change this in the PBX script to match)
byte server[] = { 192, 168, 15, 5 }; // Asterisk PBX

Client client(server, 80);

void setup(){
  Ethernet.begin(mac, ip);
  delay(1000);
}

void loop(){
  int time = millis();
  
  if (time == 3000){
    if (client.connect()) {
      client.println("GET /arduino_call.php HTTP/1.0");
      client.println();
    }
  }
}
