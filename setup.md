- install the following if not already installed
  - Xampp https://www.apachefriends.org/index.html
  - git https://git-scm.com/
  - studio code https://code.visualstudio.com/
  - composer https://getcomposer.org
  - node.js https://nodejs.org
  - Add \xmpp\mysql\bin to user path variable


- to create a laravel project named project1 (option 1)
  - composer create-project --prefer-dist laravel/laravel project1 (create a directory called project1)
- to create a laravel project project2 (option 2), the first 2 only need to do once)
  - composer global require laravel/installer
  - add %USERPROFILE%\AppData\Local\Microsoft\WindowsApps to user path variable
  - laravel new project2 (creates a directory called project2)
  - php artisan serve, starts your project athttp://127.0.0.1:8000/

composer global update laravel/installer (to get newer version of laravel)
  - php artisan route:list
  - to create a controller with methods like index, create, store, show, edit, update, destroy
    - php artisan make:controller --resource PostsController
    - php artisan 

  Interesting things
  https://codingfaculty.com

Views
  - @yield('content'), @yield('footer') in layouts/app.blade.php
  - @extends('layouts.app') in contract.blade.php
  - @section('content')...(html code) @stop in cantact.blade.php
  - @section('footer')...(html code) @stop in cantact.blade.php
  - @include
  - @if (count($people)) @endif
  - @foreach($people as $person) @endforeach

Migrations
  - create a new database in mysql (only needed to be done once)
  - add password in env file (only needed to be done once)
  - php artisan make:migration filename (creates file in database\migrations)
  - php artisan migrate
  - https://laravel.com/docs/5.0/schema

  Model
  - php artisan make:model Post -m (creates file in app\Models, -m creates a migration at the same time)
  - protected $table = 'table'; (use if model is not associated with default, Post model = posts table)
  - protected $primaryKey = 'post_id'; (use if primary key is not 'id')
  - https://laravel.com/docs/8.x/queries
  

Things different in tutorial:
  - dont go to app\http\routes, just routes\web.php directory
  - use full controller name ig Route::get('/something','\full\name@index')