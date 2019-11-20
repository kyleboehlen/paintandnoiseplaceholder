# Paint and Noise Placeholder

## Installation
Before installing the site the following tools need to be installed:
- php7.2 or higher with the extensions
- apache2
- MySQL (MariaDB)
- git
- composer (added to the PATH)

<br/>
Start by cloning into the repository

`git clone https://github.com/kyleboehlen/paintandnoiseplaceholder.git`

<br/>
cd into the project directory

`cd paintandnoiseplaceholder`

<br/>
Install the required depdendencies

`composer install`

<br/>
Create a copy of the enviroment file from the template

`cp .env.example .env`

<br/>
Point the ssl apache2 config entry to the public folder
- Change to the apache2 root directory

   `cd /etc/apache2/sites-available`
- Open the configuation file

   `sudo nano 000-default-le-ssl.conf`
- Edit the paintandnoise entry:

   `DocumentRoot /var/www/html/paintandnoiseplaceholder/public`
- Restart apache2

   `sudo service apache2 restart`

<br/>
In order to allow laravel to handle URLs, make sure the apache mod_rewrite extension is enabled and allow overrides
- Edit apache2.conf to allow overrides

   `cd etc/apache2/`

   `sudo nano apache2.conf`
- Add the following to the directory settings

```
   <Directory /var/www/html/paintandnoiseplaceholder/public>

      Options Indexes FollowSymLinks

      AllowOverride All

      Require all granted

   </Directory>
```

- Enable mod_rewrite extension

   `sudo a2enmod rewrite`
- Restart apache2

   `sudo service apache2 restart`

<br/>
Allow apache to serve the files

`sudo chown -R www-data:{your_user_group} paintandnoise`

<br/>
Install the node dependancies

`npm install`

<br/>
Compile the stylesheet

`npm run build-css`

<br/>