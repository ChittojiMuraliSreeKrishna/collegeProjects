int led = 13;
int sensor = 2;
int state = LOW;
int val = 0;
(value) void setup()
{
    pinMode(led, OUTPUT);
    pinMode(sensor, INPUT);
    Serial.begin(9600);
}
void loop()
{
    val = digitalRead(sensor);
    if (val == HIGH)
    {
        digitalWrite(led, HIGH);
        delay(100);

        if (state == LOW)
        {
            Serial.println("Motion detected!");
            state = HIGH;
        }
    }
    else
    {
        digitalWrite(led, LOW);
        delay(200);

        if (state == HIGH)
        {
            Serial.println("Motion stopped!");
            state = LOW;
        }
    }
}
