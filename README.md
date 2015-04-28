# IRM Evangelical Church Website - integration/staging tree

http://www.irmevangelicalchurch.org

# Goal

IRM Evangelical Church Website to facilitate information, gather statistical data and to strictly monitor local church growth in accordance with the program IRM 2020 timeline.

# Development process

Developers work in their own trees, then submit pull requests when they think their feature or bug fix is ready.  The code is written in PHP and uses the CodeIgniter framework, it is easy for students and volunteers to learn.

The API, the proposed mobile code are seperated from this repository.

If it is a simple/trivial/non-controversial change, then one of the IRM Evangelical Church development team members simply pulls it.

# Installation

Please read on how to install on your local dev machine see [INSTALLATION.md](INSTALLATION.md)

### Style Guide ###

Please follow CodeIgniter [Style guide](https://ellislab.com/codeigniter/user-guide/general/styleguide.html)

### Migration Tool ###

The migration tool can be run on the command line.

```
bash:~$ php index.php cli/migrate
```
* /index -> use to show migration version
* /latest -> load latest version on migrations file, usually prefix with 3 digit numbers, underscore, and filename.php
* /reset  -> remove all migration data (by calling down() function in all migrations)
* /version/[version_number] -> go back to a certain version.