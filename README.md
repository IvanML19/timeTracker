# Time tracker

Technical test developed in PHP. It is based on Symfony and applies DDD and bounded contexts in a simple way.

Regarding the architecture, I based the project in DDD with Bounded contexts and custom namespaces. The project will be 
separated in different "layers" and this layers will share a folder with the common classes.

As a first idea, I wanted to use Doctrine. But the implementation of the data-mappers just to only use a few functionalities
requires a lot of time and a deep knowledge from that ORM. So, instead of using Doctrine I used Eloquent. The active record
and the Model layer that Eloquent provides fits perfectly in that project. If the application grows and we need more scalability,
we should change for Doctrine to ensure the workflow of our ORM.

To improve the project, we can implement CQRS and use queues (RabbitMQ for instance) to not collapse our hosts (moving to an
event driven architecture). Also, for the frontend part we can another framework like React, because we have an API that is 
providing the Database information.

## Kick off 🚀

Take a look into **Makefile** to know how to run the project and all the commands that are available.


### Pre-requisites 📋

Basically, you need **docker**. You can dowload it here: https://www.docker.com/products/docker-desktop


### Installation 🔧

By running the following **Make command**, the dependencies will be installed and docker will mount all the containers

```
make run
```

If you need to only **install dependencies**, you can run:

```
make composer-install
```

Composer install is using _hirak/prestissimo_ (https://github.com/hirak/prestissimo), that improves a lot the speed of the installation of the dependencies.

Finally, you can reach the frontend part at: localhost:8020.
Backend is hosted at localhost:8010.

Last check to see if everything is working fine, is to go to '/status' endpoint for both environments. It should show 'status' => 'ok'.

## Backend

I focused the test on that part. I created a DDD approach with Bounded Contexts. You can have in the same repository
multiples projects. In that case, I have created Backend and Frontend only. But both should go inside a folder called 'Web'
if we create another app inside the apps folder. 

The apps folder is just handling the entrypoints to our application. The 'core' code is in ./src folder, separated by applications.
Inside of any bounded contexts, you will see the modules of that context, and inside the modules, the three layers of the application.

If the code is separated in that way, is super clear to look for any functionality/module or even extract them to create another
bounded contexts if the feature requires it. 

## Frontend

I developed the frontend with Bootstrap + jQuery frameworks. I know that this is very old school, but is the safe way 
for me to create a page.

The main problem that I have faced here is the CORS. I am not used to prepare new environments from scratch (I am using Docker from 2 months ago)
and the connection between them was always throwing that kind of error.

## Tests ⚙️

### End-to-end tests 🔩

I take the chance to try to implement Behat. I had never work with it, so it was my first time and chance to implement it from zero.
It gives my a lot of problems in terms of versions and so on, so it is only installed

### Unit tests ⌨️

To run the tests use the following command:

```
make test
```

Test folder is using the same structure as I have in src folder. Thanks to this, if any test fails, you know easily 
where is the error and do not need to look for where is happening.

## Built with 🛠️

* [Symfony 5](https://symfony.com/)
* [PHPUnit](https://phpunit.de/)
* [Composer](https://getcomposer.org/)
* [Docker](https://www.docker.com/)
