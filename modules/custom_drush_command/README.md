CONTENTS OF THIS FILE
---------------------
 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Author/Contact details

INTRODUCTION
-----------

 * This module shows how to write your own custom drush commands. Compatible with Drupal 8, 9 and 10.

REQUIREMENTS
------------

 * None.

INSTALLATION
------------

 * Clone or download the module and put into "modules" -> "custom" directory. It is recommended to put custom modules inside the "custom" folder.

 * To enable the module go to Administer > Modules, and enable "Custom Field".

 * Clear the site cache and type "drush" or "drush list" to list all available commands. You will see new commands available under group "custom_drush_command:"

 custom_drush_command:commandName (foo)     Command description here.                                                                      
 
 Example: drush foo test
 output: Achievement unlocked.
 
 custom_drush_command:token (token)         An example of the table output format.

 Example: drush token
 output: This will list all the available tokens of your site.

CONFIGURATION
-------------
 * None.

AUTHOR / CONTACT Details
------------------------
Author:
 * Prashant Chauhan(Prashant.c) - https://www.drupal.org/u/prashantc

Github profile:
 * https://github.com/prashantdsala

Github Drupal Repository: 
 * https://github.com/prashantdsala/Drupal

LinkedIn profile
 * https://in.linkedin.com/in/prashant-chauhan-dharamshala

Skype ID:
 * p1989chauhan

Email:
 * p1989chauhan@gmail.com
 
Found this helpful:
===================
[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/prashantdsala)