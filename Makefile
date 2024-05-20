default: run


.PHONY: run
run:
	./local.sh


.PHONY: install
install:
	@echo "Setting up Local docker MySQL database"
		@if [ -z $$(docker ps -q -f name=cosplay_mysql) ]; then \
			if [ -z $$(docker ps -aq -f status=exited -f name=cosplay_mysql) ]; then \
				docker run --detach --rm --name cosplay_mysql -p 3306:3306 \
				-e MYSQL_ROOT_PASSWORD=secret \
				-e MYSQL_DATABASE=cosplay \
				-e MYSQL_USER=cosplay \
				-e MYSQL_PASSWORD=secret \
				-v $(PWD)/migrations/:/docker-entrypoint-initdb.d/ \
				mysql:8.0; \
			else \
				docker start cosplay_mysql; \
			fi \
		else \
			echo "cosplay_mysql is already running"; \
		fi
		@echo "Waiting for MySQL to start"
		@while ! docker exec cosplay_mysql mysqladmin ping --silent; do sleep 1; done
	@echo "Installed requirements"

	@echo "Run 'make run' to start the application"


# runs the resources/setup/db.sql file
.PHONY: migrate
migrate:
	@echo "Running migrations"
	@docker exec -i cosplay_mysql mysql -ucosplay -psecret cosplay < resources/setup/db.sql
	@echo "Migrations complete"
