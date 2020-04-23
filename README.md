# Time tracker

Technical test developed in PHP. It is based on Symfony and applies DDD and bounded contexts in a simple way.


## Kick off 🚀

Take a look into **Makefile** to know how to run the project


### Pre-requisites 📋

Basically, you need **docker**. You can dowload it here: https://www.docker.com/products/docker-desktop


### Installation 🔧

By running the following **Make command**, the dependencies will be installed and docker will orquest all the containers

```
make run
```

If you need to only **install dependencies**, you can run:

```
make composer-install
```

Composer install is using _hirak/prestissimo_ (https://github.com/hirak/prestissimo), that improves a lot the speed of the installation of the dependencies.

Finally, you can reach the frontend part at: localhost:8020

## Tests ⚙️

### End-to-end tests 🔩

I take the chance to try to implement Behat. I had never work with it, so it was my first time and chance to implement it from zero.


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
