#include <WiFi.h>
#include <WiFiClient.h>
#include <WiFiServer.h>
#include <WiFiUdp.h>
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#define USE_SERIAL Serial


//LCD
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

//Node MCU
ESP8266WiFiMulti WiFiMulti;
HTTPClient http;
float vref = 3.3;
float resolusi = vref*100/1023;
String payload;
const char* ssid = "wifi-iot";
const char* password = "password-iot";
String server = "http://localhost.scode.web.id/2023-frengky-doorlock/server.php";
String apikey = "844fd3c289085bda3a1455c29aac8d92";

int port_relay_1 = D0;
int port_tombol_1 = D5;

void konek_wifi()
{
  USE_SERIAL.begin(9600);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    USE_SERIAL.print(".");
  }
  USE_SERIAL.println("");
  USE_SERIAL.println("WiFi terhubung ");
  USE_SERIAL.print("SSID: ");
  USE_SERIAL.println(WiFi.SSID());
  USE_SERIAL.print("IP Address: ");
  USE_SERIAL.println(WiFi.localIP());
  lcd.setCursor(0,1);
  lcd.print(WiFi.localIP());

  WiFi.setAutoReconnect(true);
  WiFi.persistent(true);
}
String OUT_0;
String OUT_1;
String OUT_2;
String OUT_3;
String OUT_4;
String OUT_5;
String OUT_6;
String OUT_7;
String OUT_8;


void iot(String nilai)
{
    if((WiFiMulti.run() == WL_CONNECTED)) {
        USE_SERIAL.print("[HTTP] Memulai...\n");
        http.begin(server + "?apikey=" + apikey + (String) nilai);  
        USE_SERIAL.print(server + "?apikey=" + apikey + (String) nilai);  
        USE_SERIAL.print("[HTTP] Melakukan GET ke server...\n");
        int httpCode = http.GET();
         if(httpCode > 0) {
            USE_SERIAL.printf("[HTTP] kode response GET: %d\n", httpCode);
            if(httpCode == HTTP_CODE_OK) {
                payload = http.getString();
                const size_t capacity = JSON_OBJECT_SIZE(3) + JSON_ARRAY_SIZE(2) + 60;
                 DynamicJsonBuffer jsonBuffer(capacity);
                 JsonObject& root = jsonBuffer.parseObject(payload);
                 if (!root.success()) {
                    USE_SERIAL.println(F("Parsing failed!"));
                   
                    
                 return;
                }
                USE_SERIAL.println(root["out_0"].as<char*>());
                USE_SERIAL.println(root["out_1"].as<char*>());
                USE_SERIAL.println(root["out_2"].as<char*>());
                USE_SERIAL.println(root["out_3"].as<char*>());
                USE_SERIAL.println(root["out_4"].as<char*>());
                USE_SERIAL.println(root["out_5"].as<char*>());
                USE_SERIAL.println(root["out_6"].as<char*>());
                USE_SERIAL.println(root["out_7"].as<char*>());
                USE_SERIAL.println(root["out_8"].as<char*>());

                OUT_0 = (root["out_0"].as<char*>());
                OUT_1 = (root["out_1"].as<char*>());
                OUT_2 = (root["out_2"].as<char*>());
                OUT_3 = (root["out_3"].as<char*>());
                OUT_4 = (root["out_4"].as<char*>());
                OUT_5 = (root["out_5"].as<char*>());
                OUT_6 = (root["out_6"].as<char*>());
                OUT_7 = (root["out_7"].as<char*>());
                OUT_8 = (root["out_8"].as<char*>());
                
            }
            } else {
 
            USE_SERIAL.printf("[HTTP] GET gagal, error: %s\n", http.errorToString(httpCode).c_str());
            
            }
        http.end();
    }
    delay(1000);
}


void setup() {
  lcd.begin();
  Serial.begin(9600); 
  lcd.setCursor(0,0);
  lcd.print("Koneksi Server");
  konek_wifi();
  delay(3000);
  lcd.clear();
  pinMode(port_relay_1,OUTPUT);
  pinMode(port_tombol_1,OUTPUT);

  lcd.setCursor(0,0);
  lcd.print("Doorlock System");
}

void loop() {
  
  int tombol = digitalRead(port_tombol_1);
 iot("&btn="+tombol);

 if (OUT_1 == "1")
 {
    digitalWrite(port_relay_1,LOW);
    lcd.setCursor(0,1);
    lcd.print("Status : 1");
 }
 else
 {
    
    if (tombol == 1)
    {
      digitalWrite(port_relay_1,LOW);
      lcd.setCursor(0,1);
      lcd.print("Status : 1");
      delay(5000);
    }
    else
    {
      digitalWrite(port_relay_1,HIGH);
      lcd.setCursor(0,1);
      lcd.print("Status : 0");
    }
    
 }
 
 Serial.println(tombol);
 delay(2000);
// lcd.setCursor(0,0);
// lcd.print("Labrobotika.com");
// delay(3000);
// digitalWrite(port_relay_1,HIGH);
// delay(3000);
// digitalWrite(port_relay_1,LOW);
}
