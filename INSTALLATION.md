INSTALLATION NOTES
==================
Note: There is an alternative way doing the setup please refer to [Vagrant Repository](https://github.com/irmec/vagrant)

#Windows 

## Pre-requisites

### 1st Step Download all this first and install 
(Skip if you have already done so)
- Wamp or Xampp

- Download Tortoisegit -
[32-bit](http://download.tortoisegit.org/tgit/1.8.14.0/TortoiseGit-1.8.14.0-32bit.msi) 
[64-bit](http://download.tortoisegit.org/tgit/1.8.14.0/TortoiseGit-1.8.14.0-64bit.msi)

- Download Git - [MSysGit](https://msysgit.github.io/)

- CodeIgniter Manual - [CHM Version](https://www.dropbox.com/s/3jpw7urei0c00fc/CodeIgniter-2.1.4.chm?dl=0)

 
### 2nd Step

- On Xampp find htdocs c:\xampp\htdocs on wamp c:\wamp\www 

- then right click the folder select GIT CLONE after a window pop up, 

- paste this on URL: https://github.com/irmec/irmec-website (Link only)

- then click OK. Wait until the Command progess done.

- after its done it would create irmec-website folder.

- if you want to run it via http://localhost/irmec-website you need to do the following

- now find the .HTACCESS and open it on any editor (notepad,notepad++,Sublime,etc)

- now find the RewrtireBase / (Line 3) and Add this irmec-website/ --- Like this -> RewriteBase /irmec-website/

- now find the CONFIG.PHP inside Application folder then config folder, (applications/config/config.php) 
  open it on any editor (notepad,notepad++,Sublime,etc)

- now find the $config['base_url'] = 'http://localhost/irmec-website/'; (Basically its on line 17)

### 3rd step for database

- create a database named it irmec_scratch

- then paste this on any browser http://localhost/irmec-website/cli/migrate

### 4th step

- paste this on any browser http://localhost/irmec-website

FINISHED!

#Linux

##Debian or Ubuntu

- $ sudo apt-get install php5 apache2 git

- $ cd /var/www/html 

- /var/www/html$ git clone git@github.com:irmec/irmec-website.git

- $ cd irmec-website

- create a database irmec-scratch using mysql

- $ php index.php cli/migrate

- check your browser for http://localhost/irmec-website


##Fedora or CentOs

- $ sudo yum install php5 apache2 git

- $ cd /var/www/html 

- /var/www/html$ git clone git@github.com:irmec/irmec-website.git

- $ cd irmec-website

- create a database irmec-scratch using mysql

- $ php index.php cli/migrate

- check your browser for http://localhost/irmec-website


### Access the admin panel http://localhost/irmec-website/admin 

* username: admin@irmevagelicalchurch.org 

* password: demo





