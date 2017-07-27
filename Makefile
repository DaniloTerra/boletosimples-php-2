configure-dev: composer-install

composer-install:
	@docker run --rm --volume $(PWD):/app composer install

composer-update:
	@docker run --rm --volume $(PWD):/app composer update

unit-test:
	@docker run --rm --volume $(PWD):/app composer run-script test tests/
