configure-dev: composer-install

composer-install:
	@docker run --rm --volume $(PWD):/app composer install

composer-update:
	@docker run --rm --volume $(PWD):/app composer update

test:
	@docker run --rm --volume $(PWD):/app composer run-script test

test-unit:
	@docker run --rm --volume $(PWD):/app composer run-script test-unit

test-integration:
	@docker run --rm --volume $(PWD):/app composer run-script test-integration
