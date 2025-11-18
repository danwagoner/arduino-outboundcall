# Description

### Asterisk Code
A php script lives on your Asterisk server (hosted up by apache) that, when it's accessed, checks to make sure the client accessing it matches a pre-defined IP of your Arduino. If so, it creates a call file with the criteria that you configure to call a number of your choice and drops it in the Asterisk outgoing queue directory, triggering Asterisk to make a call.

### Arduino Code
The sketch code is easy...simply trigger a client connection to the Asterisk server when a button is pushed, motion sensor tripped, or ultra sonic range finder measures a particular distance (that part is up to you). As long as the Arduino's IP matches the allowed IP configured in the php script, your phone should ring.

### Details
https://nerdybynature.com/arduino/2010/09/10/br-r-r-r-r-ing-its-your-arduino.html
