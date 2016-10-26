# Async PHP Framework Benchmark

Which async framework perform the most ?



| Framework | Website                                  | Github                                   |
| --------- | ---------------------------------------- | ---------------------------------------- |
| ReactPHP  | [http://reactphp.org/](http://reactphp.org/) | [https://github.com/reactphp](https://github.com/reactphp) |
| Workerman | [http://www.workerman.net](http://www.workerman.net/) | [https://github.com/walkor/Workerman](https://github.com/walkor/Workerman) |
| Daemon.io | [https://daemon.io/](https://daemon.io/) | [https://github.com/kakserpom/phpdaemon](https://github.com/kakserpom/phpdaemon) |
| Kraken    | [http://kraken-php.com/](http://kraken-php.com/) | [https://github.com/kraken-php/framework](https://github.com/kraken-php/framework) |





## Docker

The easiet way to test is to run in docker.

### Build you docker container

```sh
docker build -t workermanbench .

docker run --name asyncphpbench -d -p 1337:1337 -v ~/Sites/php-async-benchmark:/home/benchmark php:7
```
Assuming you have cloned the repo in you `Sites` folder in your home directory.

-v ~/Sites/nsa/docker/nsa-php.ini:/usr/local/etc/php/conf.d/nsa-php.ini 

### Connect your docker


```sh
docker exec -i -t asyncphpbench /bin/bash
```



## Benchmark test

```
ab -n 1000 -c 20 http://IP:1337
```

https://github.com/cmpxchg16/gobench

## Install mandatory libs

### Install libevent on PHP 7

Libevent is not availaible on PECL pour PHP 7

You need to compile https://github.com/expressif/pecl-event-libevent

```sh
apt-get install php7.0-dev

```

### Install event 

```
apt-get install php-pear
pecl install event
```