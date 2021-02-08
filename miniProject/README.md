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

# pictures
![cs7](https://user-images.githubusercontent.com/62329524/107241017-7805a400-6a22-11eb-91f7-3dad4c909056.jpg)
![cs8](https://user-images.githubusercontent.com/62329524/107241082-8c49a100-6a22-11eb-9d7f-04b75ba7794f.jpg)
![cs9](https://user-images.githubusercontent.com/62329524/107241131-979ccc80-6a22-11eb-99ad-4d34da905220.jpg)
