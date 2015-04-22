1st Step Download all this first and install

Download Tortoisegit - Link Below
http://download.tortoisegit.org/tgit/1.8.14.0/TortoiseGit-1.8.14.0-32bit.msi

Download Git - Link Below
https://msysgit.github.io/

codeIgniter Manual - Link Below
https://www.dropbox.com/s/3jpw7urei0c00fc/CodeIgniter-2.1.4.chm?dl=0

 
2nd Step

- Now Create a folder and named it (irmec) with out parenthesis on HTDOCS if you are using xampp. 

- then right click the folder select GIT CLONE after a window pop up, 

- paste this on URL: https://github.com/irmec/irmec-website (Link only)

- then click OK. Wait until the Command progess done.

- after its done place all folder and file outside the irmec-website folder.

- then delete the irmec-wesite folder

- now find the .HTACCESS and open it on any editor (notepad,notepad++,Sublime,etc)

- now find the RewrtireBase / (Line 3) and Add this irmec/ --- Like this -> RewriteBase /irmec/

- now find the CONFIG.PHP inside Application folder then config folder, (applications/config/config.php) 
  open it on any editor (notepad,notepad++,Sublime,etc)

- now find the $config['base_url'] = 'http://localhost/irmec-website/'; (Basically its on line 17)

- change the link to this 'http://localhost/irmec/';

3rd step for database

- create a database named it irmec-scratch

- then paste this on any browser http://localhost/irmec/cli/migrate

4th step

- paste this on any browser localhost/irmec

FINISHED!




