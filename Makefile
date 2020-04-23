current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# Composer
composer-install: CMD=install
composer-update: CMD=update
composer-install composer-update:
	@docker run --rm --interactive --volume $(current-dir):/app --user $(id -u):$(id -g) \
		clevyr/prestissimo $(CMD) \
			--ignore-platform-reqs \
			--no-ansi \
			--no-interaction

# Docker
#build: CMD=build --pull --force-rm --no-cache
start: CMD=up -d
start-build: CMD=up --build
stop: CMD=stop
destroy: CMD=down
start start-build stop destroy:
	@docker-compose $(CMD)

# MySQL
check-mysql:
	@docker exec degustabox-mysql mysqladmin --user=root --password=secret --host "127.0.0.1" ping --silent

# Test
make tests:
	./vendor/bin/phpunit
########
# Install all dependencies
dependencies: composer-install
# Install dependencies and run docker-compose up
run: dependencies start