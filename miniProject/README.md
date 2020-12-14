# Internet_of_things
i just divided the pir and gsm_gps codes,it basically sends gps co-ordinates to the given number, but check for gps modules if not it will take the improper indexing and send fault values, so use the better gps module,
a little glitch it keeps on sending the location co-ordinates until we stop manually 
## pirsensor.ino
```c++
int led = 13; // for led strip
int sensor = 2; // sensor placement
int state = LOW; // primarily state is LOW so that when pir detects it will become high
int val = 0;
```
## gsm_gps.ino
>for mobile number and serial count
```c++
SoftwareSerial Gsm(7, 8);
char phone_no[] = "Your mobile number";
```
! if the gps module doesn't take proper indexing it will give wrong info
