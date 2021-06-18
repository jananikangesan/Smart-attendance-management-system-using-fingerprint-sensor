#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include<SPI.h>
#include <SD.h> 
#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <RTClib.h> 

LiquidCrystal_I2C lcd(0x27, 20, 2);

int getFingerprintIDez();


SoftwareSerial mySerial(2, 3);


Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
uint8_t id;
File myFile;
int Status = 0;
const int chipSelect = 4;
RTC_DS3231 rtc;

char daysOfTheWeek[7][12] = {"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"};

void setup()  
{
 lcd.backlight();
  
pinMode(chipSelect,OUTPUT);
  pinMode(7,OUTPUT);
  pinMode(6,OUTPUT);
  lcd.init();
  digitalWrite(7, HIGH);
  lcd.begin(16, 2);
  lcd.setCursor(3, 0);
  lcd.print("WELCOME UOJ");
  lcd.setCursor(2, 1);
  lcd.print("CS DEPARTMENT");
  delay(3000);
  lcd.clear();
  lcd.setCursor(3, 0);
  lcd.print("PLACE YOUR");
  lcd.setCursor(5, 1);
  lcd.print("FINGER");
  delay(1000);
  digitalWrite(7, LOW);
  
 
    Serial.begin(9600);
  Serial.println("fingertest");

  // set the data rate for the sensor serial port
  finger.begin(57600);

  
  if(!rtc.begin()) {
    Serial.println("Couldn't find RTC");
    while(1);
  }
  else {
    // following line sets the RTC to the date & time this sketch was compiled
  // rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));
    // for example to set January 27 2017 at 12:56 you would call:
    // rtc.adjust(DateTime(2021, 2, 10, 21, 18, 00));
  }
  
  
  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
    
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1);
  }
  Serial.println("Waiting for valid finger...");
  lcd.init();

   if (!SD.begin(chipSelect)) {
  
    while (1);
  }
  
uint8_t userId = -1;
 }
void loop()                     
{
 
digitalWrite(6, HIGH);
  uint8_t userId = -1;
  Status = 0;
  getFingerprintIDez();
    
  if(finger.fingerID==1){
     if (finger.confidence >= 50) {
      
      userId = getFingerprintIDez();
      if(userId >=1 && Status != 1)
      {
        lcd.clear();
        lcd.setCursor(1,0);
        lcd.print("HI Yathu");
              
        }
       }
    }
    if(finger.fingerID==2){
     if (finger.confidence >= 50) {
      
      userId = getFingerprintIDez();
      if(userId >=1 && Status != 1)
      {
        lcd.clear();
        lcd.setCursor(1,0);
        lcd.print("HI jathi");
       }
    }
    }
     if(finger.fingerID==3){
     if (finger.confidence >= 50) {
      
      userId = getFingerprintIDez();
      if(userId >=1 && Status != 1)
      {
        lcd.clear();
        lcd.setCursor(1,0);
        lcd.print("HI Lahiru");
       }
    }
    }
     if(finger.fingerID==4){
     if (finger.confidence >= 50) {
      
      userId = getFingerprintIDez();
      if(userId >=1 && Status != 1)
      {
        lcd.clear();
        lcd.setCursor(1,0);
        lcd.print("HI Janani");
       }
    }
    }
     if(finger.fingerID==5){
     if (finger.confidence >= 50) {
      
      userId = getFingerprintIDez();
      if(userId >=1 && Status != 1)
      {
        lcd.clear();
        lcd.setCursor(1,0);
        lcd.print("HI Amila");
       }
    }
    }
    
    
      }
  
   uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Did not find a match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  Serial.print(" with confidence of "); Serial.println(finger.confidence); 
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;
     
   

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;
  
  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID); 
  Serial.print(" with confidence of "); Serial.println(finger.confidence);
  int toLog = finger.fingerID;
  delay(500);
  Serial.println("logging...");
  logData(toLog);
  return finger.fingerID; 
}
void logData(int d)
{
  myFile=SD.open("storage.csv",FILE_WRITE);
 
  if(myFile)
  {
    
    myFile.print("USER ID ");
   // myFile.print(d);
    myFile.print(d);
    Serial.println("data logged");
    //myFile.close();
     myFile.print(",");   
    
    // Save time on SD card
    DateTime now = rtc.now();
    myFile.print(now.year(), DEC);
    myFile.print('/');
    myFile.print(now.month(), DEC);
    myFile.print('/');
    myFile.print(now.day(), DEC);
    myFile.print(',');
   
    myFile.print(now.hour(), DEC);
    myFile.print(':');
    myFile.println(now.minute(), DEC);

    
    // Print time on Serial monitor
    Serial.print(now.year(), DEC);
    Serial.print('/');
    Serial.print(now.month(), DEC);
    Serial.print('/');
    Serial.print(now.day(), DEC);
    Serial.print(' ');
    Serial.print(now.hour(), DEC);
    Serial.print(':');
    Serial.println(now.minute(), DEC);
    Serial.println("sucessfully written on SD card");
    myFile.close();
  }
  else{
        Serial.println("error logging data");
  }
}
