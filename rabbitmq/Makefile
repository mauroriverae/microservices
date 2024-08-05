#!/bin/bash


RABBITMQ = mr-ms-rabbitmq-service
UID = $(shell id -u)

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echp 'targets:'
	@agrep '^(.+)\:\ ##\ (/+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

start: ## Start the container
	U_ID=${UID} docker-compose up -d

stop: ## Stop the containers
	U_ID=${UID} docker-compose stop

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) start

ssh: ## Bash into the container
	U_ID=${UID} docker exec -it --user ${UID} ${RABBITMQ} bash
