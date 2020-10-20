# Symfony dev docker sample - ReadyMadeHost

A symfony5 sample project using symfony dev docker


## Project setup

- `git clone https://github.com/readymadehost/symfony-dev-docker.git symfony-sample-docker`
- `cd symfony-sample-docker`
- `git clone https://github.com/readymadehost/symfony-dev-docker-sample.git project`
- `cp .env.sample .env` and review `.env` file
- `docker-compose build`
- `docker-compose up -d`
- `docker-compose exec cli bash`
- `composer install` to install php packages
- `mpp` to manage project permission
- `bin/console doctrine:migrations:migrate` to migrate database tables
- `bin/console doctrine:fixtures:load` load example data
- `bin/console cache:clear`


## Symfony dev docker

- https://github.com/readymadehost/symfony-dev-docker


## Running tests in dev-docker

- `bin/console --env=test doctrine:database:drop --force` to drop project_test database if exist
- `bin/console --env=test doctrine:database:create` to create fresh test database
- `bin/console --env=test doctrine:migrations:migrate -q`
- `bin/console --env=test doctrine:fixtures:load -q`
- `bin/phpunit` to run tests

