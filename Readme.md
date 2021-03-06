# Acme course files

**note: you may need to close other running vm for this one to install smoothly**

## First download

Download the installation folder into the acme folder on local machine. (from the github repo)

## Initialize vm

To initialize vagrant machine (only when setting up the project first time)

`cd /path/to/acme/`  (cd ~/Development/cours/modern-development/acme)

`vagrant init ubuntu/trusty64; vagrant up --provider virtualbox`

## log into the virtual machine

`vagrant ssh`

### From inside the machine

`cd /vagrant/installation`

`sh install.sh`

```
  -> Enter on first prompt
  -> MariaDB user = `vagrant`
  -> MariaDB password = `secret`
  -> Re-enter secret
  -> Re-enter secret again
```
  
**When asked to exit and vagrant reload, first:**

on host machine:

`cd ~/path/to/acme`
`pico Vagrantfile`

and add these lines at line #26:

```
config.vm.network "forwarded_port", guest: 80, host: 8080
config.vm.network "forwarded_port", guest: 3306, host: 33060
config.vm.network "forwarded_port", guest: 5432, host: 54320
config.vm.network "forwarded_port", guest: 1080, host: 1080
```

Save and close the file (Ctrl-O; Ctrl-X)

From vm terminal:

`exit`

From host terminal:

`vagrant reload`

You are all set with a running vm !

**(note: you may need to close other running vm for this one to run smoothly)**

## Installing Composer on the server.

### From host terminal:

`cd /path/to/project/acme`

`vagrant ssh`

### From inside the vm machine terminal:

`cd /vagrant`

`curl -sS https://getcomposer.org/installer | php` and then `sudo mv composer.phar /usr/local/bin/composer`

`composer init` ... And Answer the questions :

```
Author = email address
Would you like to define your dependencies (require) ? NO
Would you like to define your dev dependencies (require-dev) ? NO
```

## Changing the public directory

Create the public folder: `mkdir public`

`sudo vi /etc/nginx/sites-available/default`  (only on nginx servers) then change the `root /vagrant` to `root /vagrant/public` and save (ESC : wq)

Restart the server `sudo service nginx restart` to have the change taken into effect

## Forcing request to go to public/index.php

`sudo vi /etc/nginx/sites-available/default` then change :

```
location / {
	try_files $uri $uri/ =404;
}
```

to 

```
location / {
	try_files $uri $uri/ /index.php?$query_string;
}
```

and restart server `sudo service nginx restart`

## Adding to GIT

In main folder, create file `.gitignore` (see in repo for content)

from vm terminal: `git init`

`git config --global user.email "pag****@de********.com"`

`git config --global user.name "Pag**** K."`

`git add .` and then `git commit -m "Initial commit"`

### Adding to Github

Go to github.com and add a new repo. Choose the **...or push an existing repository from the command line** and enter the commands in the terminal

## DB Migration with Phinx

From host terminal in project folder: `composer require robmorgan/phinx 0.4.4`

Then: `php vendor/bin/phinx init`  and then go change the phinx.yaml file to put your db creditentials.

Check the doc, but here is how to create a migration: `php vendor/bin/phinx create CreateUserTable`

This will create the /migrations/CreateUserTable migration that you need to edit. See the repo migrations files.

When ready to run the migration: `php vendor/bin/phinx migrate -e development`  the -e development is optional on dev server

If ever want to undo the migrations: `php vendor/bin/phinx rollback -e development`

