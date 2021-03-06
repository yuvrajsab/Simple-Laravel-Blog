# Simple-Laravel-Blog
A demonstration of a simple blog made with laravel php.

![Blog Demo](/my_blog.png)

### Requrements
* Php CLI >= 7.1.3
* Mysql = 8.0
* Php Composer


* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Install
1. Rename ".env.example" file to ".env"
2. run "php artisan key:generate" command in project folder
> Simple-Laravel-Blog/php artisan key:generate
3. Create database "blog".
4. Change database settings in ".env" file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=YOUR USERNAME
DB_PASSWORD=YOUR PASSWORD
```
5. run "php artisan migrate" command in project folder
> Simple-Laravel-Blog/php artisan migrate
6. run “php composer.phar install” command in project folder to install dependencies
> Simple-Laravel-Blog/php composer.phar install
7. run "php artisan serve" command for starting development server.
> Simple-Laravel-Blog/php artisan serve
