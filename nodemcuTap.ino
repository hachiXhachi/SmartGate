#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#define ON_Board_LED 2
// const char* ssid = "AXE-142";
// const char* password = "KIYOKOKURO142";
const char* ssid = "PLDTHOMEFIBR2ch2J";
const char* password = "Albarofamilywifi@3123";
// const char* ssid = "Kisses";
// const char* password = "1234567890";
// const char* ssid = "hey";
// const char* password = "12345678";
HTTPClient http; //--> Declare object of class HTTPClient
WiFiClient client;
void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);  //--> Connect to your WiFi router
  Serial.println("");

  pinMode(ON_Board_LED, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH);  //--> Turn off Led On Board

  //----------------------------------------Wait for connection
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    //----------------------------------------Make the On Board Flashing LED on the process of connecting to the wifi router.
    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
  digitalWrite(ON_Board_LED, HIGH);  //--> Turn off the On Board LED when it is connected to the wifi router.
  //----------------------------------------If successfully connected to the wifi router, the IP Address that will be visited is displayed in the serial monitor
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");
}

void loop() {
  if (Serial.available() > 0) {
    String rfidCode = Serial.readStringUntil('\n');
    digitalWrite(ON_Board_LED, LOW);
    String postData;
    //Post Data
    postData = "UIDresult=" + rfidCode;
    // Your_Host_or_IP = Your pc or server IP, example : 192.168.0.0 , if you are a windows os user, open cmd, then type ipconfig then look at IPv4 Address.
    http.begin(client, "http://192.168.1.3/SmartGate/getUIDTap.php");       //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");  //Specify content-type header
    int httpCode = http.POST(postData);                                   //Send the request
    String payload = http.getString();                                    //Get the response payload
   //Print request response payload
   Serial.print("recieved:"+payload);
    http.end();  //Close connection
    // delay(1000);
    
   
    digitalWrite(ON_Board_LED, HIGH);
    if (payload.indexOf("Granted") != -1) {
      Serial.print(1); 
       // Access granted
    } else {
      Serial.print(0);  // Access denied
    }
  }
}

