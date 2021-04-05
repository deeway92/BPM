
#define USE_ARDUINO_INTERRUPTS true    // Configure les interruptions de bas niveau pour la plupart des calculs du BPM
#include <PulseSensorPlayground.h>     // Inclut la bibliothèque PulseSensorPlayground.

//  Variables

const int PulseWire = 0;
const int LED13 = 13;         
int Threshold = 550;          


                               
PulseSensorPlayground pulseSensor;  // Crée une instance de l’objet PulseSensorPlayground appelé "pulseSensor"


void setup() {   

  Serial.begin(9600);          // Pour l'affichage en série sur IDLE Arduino

  // On configure PulseSensor en lui assignant nos variables 
  pulseSensor.analogInput(PulseWire);   
  pulseSensor.blinkOnPulse(LED13);      
  pulseSensor.setThreshold(Threshold);   

   if (pulseSensor.begin()) {   // Si le le pulsensor fonctionne alors on print
    Serial.println("Veuillez mettre votre doigt !");
  }
}



void loop() {

 int myBPM = pulseSensor.getBeatsPerMinute();  // Appelle la fonction sur notre objet pulseSensor qui retourne BPM en tant que "int".


if (pulseSensor.sawStartOfBeat()) {            // Test constant pour voir si le battement est "True" 
 Serial.print("BPM: ");                        // Si il est "True" alors on print
 Serial.println(myBPM);                        // Print la valeur dans la fonction myBPM 
}

  delay(20);                    // Délai entre chaque valeurs

}