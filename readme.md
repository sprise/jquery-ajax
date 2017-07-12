# Demo: How to Make Ajax Requests with jQuery #

Here is a small demo about making GET and POST Ajax requests using jQuery. Since our server is going to respond to those requests, we also have some backend code to look at. PHP is going to handle our GET and POST requests, and ask for an API key and CRSF token. You can use this for Ajax as well as server side learning.

There are a lot of decisions to make even in these small scripts. I've tried to keep it from being too complex but at the same time we want to get used to putting security measures in place. 

Not as many comments this time around, so comment on this Github repo with line #'s if you have questions. 

## Getting Started ##

You will need PHP and a webserver to run it. Otherwise all the files you need are in this repo. Start a new PHP file in your favorite text/code editor, and [follow along with this video &amp; slides](https://she-builds-websites.com/presentations/single/jquery-ajax-requests). 

## Deployment / Viewing The Demo ##

You can follow along with the presentation and build out scripts.js, or you can just set index.php to pull scripts_complete.js. Then run index.php in your browser from Localhost.

**You will not be able to run this from the file protocol**. So these paths will not work:
````
c:/documents/jquery-ajax/index.php
/home/user/jquery-ajax/index.php
````

**Run it successfully** from a server with PHP:
````
http://localhost/jquery-ajax    
http://localhost/jquery-ajax/index.php
````

Remember, if the file is named index then you do usually don't have to explicitly put it in the URI.
