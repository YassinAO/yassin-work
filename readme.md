# Work-Portfolio - Yassin Ait Ougard

## About

This is my work portfolio that I'm building from scratch in the Laravel framework.
This portfolio is meant to present the projects I've been working on.


## Prerequistites
1. Laravel Homestead or an own development environment (like XAMPP/WAMP) which meets the following requirements:
	* PHP >= 7.1.3
	* OpenSSL PHP Extension
	* PDO PHP Extension
	* Mbstring PHP Extension
	* Tokenizer PHP Extension
	* XML PHP Extension
	* Ctype PHP Extension
	* JSON PHP Extension
2. Composer installed
3. Git installed

## Install
Make sure you have:
 * Node installed. If you are not sure run `$ node -V` in your terminal/commandline.
 * Composer installed. If you are not sure run `$ composer -V` in your terminal/commandline.
 * Git installed. If you are not sure run `$ git --version` in your terminal/commandline.

 ### Clone
Execute the following commands and make sure that you clone the project in your project folder of your development environment (www for WAMP, htdocs for XAMP). 
>Note that some commands may differ depending on your OS. For Mac users, use `cp` instead of `copy`.  

```
$ git clone https://github.com/Y4SSIN/yassin-work
$ cd yassin-work
$ composer install
$ npm install
$ copy .env.example .env
$ change the .env file database credentials to the credentials matching yours (e.g. XAMPP username: root, password: empty)
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
```

## Build with   
* [Laravel](https://laravel.com/) - The PHP backend framework used in this project.
* [Filemanager](https://unisharp.github.io/laravel-filemanager/) - A TinyMCE and CKeditor plugin for file uploads.
* [Sass](https://sass-lang.com/) - An extension on CSS used for frontend styling
* [Select2](https://select2.org/) - A customizable select box with support for searching and tagging.
* [JQuery](https://jquery.com/) - A Javascript library used for making things dynamic and interactive