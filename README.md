# Crawl Cosplay
Dungeon Crawl Stone Soup scoreboard keeper for the Crawl Cosplay 3-in-1 website

## Local Development

### Requirements

 - PHP 7.3
 - MySQL or compatible database
 - Composer (php package manager)
 
### Install mac/unix

 - `composer install`
 - `cp resources/setup/webserver.php webroot`
 - Import `resources/setup/db.sql` into your local database
 - Start local webserver with `resources/bin/local`

The `vendor/bin/local` injects the database credentials. Assumes that the db `cosplay` is available to user `root` with password `root` on `localhost`. Edit if not appropriate.

### Install windows

I suggest you use [git bash](https://gitforwindows.org) which allows the composer and heroku clis to work as on *nix.

## File structure

 - `app` contains backend logic like the Models and Scoring systems
 - `content/layouts/default` contains the HTML/PHP that wraps all pages (like HTML header and the body start and end)
 - `content/pages` contains the view files. There is no configration needed, a file here maps to an available url.
 - `resources` contains configuration and other bootstrapping not used for much atm
 - `tests` contains some backend logic tests
 - `webroot` everything in this folder is available directly as files in the web. Contains the images and style files
 - `vendor` contains the dependencies, should not be edited and is automatically handledby the Composer package mgnt.
