# Daily Cycle Simulation

## Description

This project simulates a daily cycle using Object-Oriented PHP. The simulation runs on a 30-minute interval and includes the following features:

- The sun rises at 6 am during summer and at 7 am during winter. There are 10 days in summer and 12 days in winter.
- The sun sets at 8 pm during summer and 7 pm during winter.
- The simulation includes four characters: a bird, a flower, a rooster, and a dog.
- The bird wakes up when the sun rises. Upon waking up, the bird feeds on nectar from flowers, randomly eating between 5-15 pieces. If it eats more than 10 pieces in a day, it goes to sleep when the sun sets.
- During winter, the bird sings to pass the time during the 1-hour wait before sunrise.
- In summer, the flower's petals open, changing from green to red for 1 hour, and then to blue for the rest of the day. The petals reset to green when the sun sets.
- The rooster sings when the sun rises, and the dog barks when the rooster sings.

## How to Run

To run the simulation, follow these steps:

1. Ensure you have PHP installed on your system.

2. Download or clone this project's repository to your local machine.

3. Open a terminal or command prompt and navigate to the project's root directory.

4. Run the simulation by executing the following command:

   php index.php

5. Change the days to run the simulation of the by changing the constants.php file