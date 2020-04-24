# Time tracker

Technical test developed in PHP. It is based on Symfony and applies DDD and bounded contexts in a simple way.

Regarding the architecture, I based the project in DDD with Bounded contexts and custom namespaces. The project will be 
separated in different "layers" and this layers will share a folder with the common classes.

As a first idea, I wanted to use Doctrine. But the implementation of the data-mappers just to only use a few functionalities
requires a lot of time and a deep knowledge from that ORM. So, instead of using Doctrine I used Eloquent. The active record
and the Model layer that Eloquent provides fits perfectly in that project. If the application grows and we need more scalability,
we should change for Doctrine to ensure the workflow of our ORM.

To improve the project, we can implement CQRS and use queues (RabbitMQ for instance) to not collapse our hosts (moving to an
event driven architecture).

## Kick off 🚀

Take a look into **Makefile** to know how to run the project


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

## Tests ⚙️

### End-to-end tests 🔩

I take the chance to try to implement Behat. I had never work with it, so it was my first time and chance to implement it from zero.
It gives my a lot of problems in terms of versions and so on, so it is only installed

### Unit tests ⌨️

_**TODO**_

```
Da un ejemplo
```
## Built with 🛠️

* [Symfony 5](https://symfony.com/)
* [PHPUnit](https://phpunit.de/)
* [Composer](https://getcomposer.org/)
* [Docker](https://www.docker.com/)
