# Events APP for Skiddle API

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Application extension](#application-extension)

## General info
The purpose of this project was to create a function to create a small responsive web application to connect to Skiddles API and allow a user to search for events and artists and to click on an event to get further information.
	
## Technologies
* PHP 7.2
* PHPUnit version 8
* Composer package Manager

## Setup
You will need to have installed on your system:
* PHP 7.2 - Information on how to install PHP (https://www.php.net/manual/en/install.php)
* PHPUnit version 8 - Information on how to install PHPUnit (https://phpunit.de/manual/6.5/en/installation.html)
* You will also need a server installed (Apache / NGINX).

Once you have these installed, download / clone this repository from the github menu. There is currently no composer package.

To view the homepage navigate to ```skiddleApi/src/view/index.php``` . All other pages served to the user are found in the ```view``` directory. The header and footer html has been seperated into ```header.php``` and ```footer.php``` in the ```view``` directory too!

There is also a ```test``` directory, which can be found ```skiddleApi/test/``` 

## Application extension
A few ways I would expand this application in the future are:
* Further unit tests on the exosting componenets I have implemented and also on any future features added.
* Error logging, add a system to log errors returned from the API to track activity and try to reduce suspicous activity.
* Add more search variables to classes, I have only added what was required so as I expand the functionality and the level of searcg the user can perform I would also look to add and increase the number of paramters that they can search for.
* Further class seperation, if further classes where added in the model folder I would look to potentially add a further layer of seperation between the controller and the existing models, perhaps have Request.php to build the actual requests.
* Further works on CSS, the application I have developed is a minimum viable product and there for would need further work on the styling.
* Better validation of data returned by the API, perhaps create a validation function and research better ways of using regex and escaping keys to try and minimise injecting potentially dangerous code into the page.
* remove .php extensions from files in .htaccess file and also add a redirect to direct the user to the correct location of the index file in ```skiddleApi/src/view/index.php```. Having said that the .htacccess file is only used with Apache servers so this would have to be handled differently if using NGINX.

