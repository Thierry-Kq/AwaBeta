SHELL := /bin/bash

reset_database: export APP_ENV=dev
reset_database:
	symfony console doctrine:database:drop --force || true
	symfony console doctrine:database:create
	symfony console doctrine:migrations:migrate -n
	#symfony console doctrine:fixtures:load -n
.PHONY: reset_database