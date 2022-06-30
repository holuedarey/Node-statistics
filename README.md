<p align="center">
Node Statistics
</p>



## About Node Statics
This Project is Mainly a CRUD Application for Nodes Operation (Create, Retrieve, Update, Delete ) and Make use of JWt as the Authentication Mechanism

## Installation
After cloning app from the repository
- run composer install
- then run ./vendor/bin/sail up to start up the project this will spin up the docker container for the mysql and configure your database as seen in the docker-composer.yml file to connect to the database on port 8001
- to check the status of the running container run docker ps -a

## Node Statistics Implementation
A Repository pattern was use an Interface was created to abstract the implementation on INodeRepository, and it was implemented on NodeRepository which was used in the NodeController and a request Vvalidator Class was created under Request Folder with name NodeRequest


## Routes
All Api Route can be found in api.php in routes folder


## Package Use
Tymon\JWTAuth\Providers\LaravelServiceProvider::class for jwt authentication,
Spatie\JsonApiPaginate\JsonApiPaginateServiceProvider::class for paginating the data

The above package was used for authentication and a middleware is created (JwtMiddleware) under middleware folder to validate each request before been access for its validity, expired before been pass



## FrameWork Use Laravel
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
