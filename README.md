# Crawl Cosplay Challenge
Dungeon Crawl Stone Soup scoreboard keeper for the Cosplay challenges

## Running the server

### Using Docker

#### Development

1. `cp .env.sample .env`
2. Build if necessary: `docker compose build`
2. Start containers: `docker compose up`

On your first run, make sure to initialize the database:

`docker exec -i cosplay-db mysql -ucosplay -pcosplay cosplay < src/resources/setup/db.sql`

You may have to wait a minute for the database to start accepting connections.

You can now open `http://localhost:8080` on your host machine

#### Production

Install the `.env` file

1. Run `cp .env.sample .env`

2. Change the admin password with `APP_PASS`, and point `DB_HOST` at your mysql server if you're not using the provided image.

Build the app image

1. Run `docker build -t cosplay-app .`

Start the app container

If you're not using the compose network with the mysql container, you might run something like this:

```
docker run \
	--name cosplay-app \
	--restart always \
	--env-file .env \
	--network host \
	cosplay-app
```

Otherwise, `docker compose build` and `up` might be sufficient.

#### Troubleshooting

* `exec /usr/src/app/resources/bin/local: no such file or directory`

Your line endings might be wrong - run `dos2unix.exe` on `src/resources/bin/local` and rebuild the image

### Manual install

#### Requirements

 - PHP 7.3
 - MySQL or compatible database
 - Composer (php package manager)
 
#### Install mac/unix

 - `composer install`
 - `cp resources/setup/webserver.php webroot`
 - Import `resources/setup/db.sql` into your local database
 - Start local webserver with `resources/bin/local`

The `vendor/bin/local` injects the database credentials. Assumes that the db `cosplay` is available to user `root` with password `root` on `localhost`. Edit if not appropriate.

#### Install windows

I suggest you use [git bash](https://gitforwindows.org) which allows the composer and heroku clis to work as on *nix.

## File structure

 - `app` contains backend logic like the Models and Scoring systems
 - `content/layouts/default` contains the HTML/PHP that wraps all pages (like HTML header and the body start and end)
 - `content/pages` contains the view files. There is no configration needed, a file here maps to an available url.
 - `resources` contains configuration and other bootstrapping not used for much atm
 - `tests` contains some backend logic tests
 - `webroot` everything in this folder is available directly as files in the web. Contains the images and style files
 - `vendor` contains the dependencies, should not be edited and is automatically handledby the Composer package mgnt.
 
