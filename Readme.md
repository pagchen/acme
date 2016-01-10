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