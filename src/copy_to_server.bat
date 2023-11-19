@echo off
: this copies all the code in the repo and places it in the right spot for
: XAMPP that allows us to all be in parity for this group project

: if the path to xampp filesystem is different for anyone we need
: to call that out and fix this, though it seems like
: https://www.apachefriends.org/download.html uses C:\xampp as the default
set baseURL="C:\xampp"

: user facing web application code goes to the document root
set webappCode="%CD%\frontend\public"
set documentRoot="%baseURL%\htdocs\"

: configuration should not go to doc root since it has our DB credentials
set configCode="%CD%\frontend\config"
set xampConfig="%baseURL%\config\"

: php.ini lets us change things about the runtime that we all need to be on the same page with
set phpIni="%CD%\frontend\php\php.ini"
set xampPhpIni="%baseURL%\php\php.ini"

: httpd.conf lets us change things about the platform, we should all use the same
set httpdConf="%CD%\frontend\apache\conf\httpd.conf"
set xampHttpdConf="%baseURL%\apache\conf\httpd.conf"

xcopy /E /I /Y "%webappCode%" "%documentRoot%"
xcopy /E /I /Y "%configCode%" "%xampConfig%"
xcopy /E /I /Y "%phpIni%" "%xampPhpIni%"
xcopy /E /I /Y "%httpdConf%" "%xampHttpdConf%"

