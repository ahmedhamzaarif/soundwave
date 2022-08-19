# SoundWave

SoundWave is a Entertainment Website, where users can listen songs and watch videos.
The website is managed by the admin panel which is built on Laravel Jetstream.

The Admin of the website can manage content right from the Admin Panel.

All the information is stored in the MySql database & linked to main view of the website.

The whole project is built on Laravel, Php & jQuery.

## Demo

Not hosted right now

### System Requirements to test the project:
This project was built on Laravel 9. Before runnuing this application make sure your localhost is set to Php v8.0.13 otherwise the web application may not work properly.


## How to test project on a localhost?

0. Download project in a zip file
1. Create a database with name Sound in phpmyadmin
2. Extract project file
3. Open Terminal in project folder & run following command to create tables in database:

```node
php artisan migrate 
```
4. Import sound.sql in database
5. Start php server by running following command:
```node
php artisan serve 
```
5. Start Vite server by running following command in separate Terminal:

```node
npm run dev 
```
6. Open web app in browser
[localhost:8000](https://localhost:8000)

## About Developer
Hey! My name is Ahmed Hamza & I'm a web developer from Karachi, Pakistan.

[Linkedin](https://linkedin.com/in/ahmedhamzaarif)
