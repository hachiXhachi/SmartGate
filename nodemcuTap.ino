#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

#define ON_Board_LED 2

const char* ssid = "";
const char* password = "";

HTTPClient http;
WiFiClient client;

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("");

  pinMode(ON_Board_LED, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH);

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
  digitalWrite(ON_Board_LED, HIGH);

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
    postData = "UIDresult=" + rfidCode;

    if (http.begin(client, "http://192.168.1.3/SmartGate/getUIDTap.php")) {
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      int httpCode = http.POST(postData);
      String payload = http.getString();
     
      http.end();
      digitalWrite(ON_Board_LED, HIGH);
      if (httpCode == HTTP_CODE_OK) {
        if (payload == "1") {
          Serial.print(1);  // Access granted
        } else {
          Serial.print(0);  // Access denied
        }
      } else {
        Serial.print("HTTP request failed with error code: ");
        Serial.println(httpCode);
      }
    } else {
      Serial.println("Failed to connect to the server.");
    }
  }
}
