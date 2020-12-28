# eCommerce

This is a eCommerce web application built by Laravel.

It serves multiple purposes
  - Blissbox Product Vending
  - User control panel
  - Merchant control panel
  - Administrator control panel

## Before you begin

1.  Clone this project into your local machine.
    `git clone `

1.  Run `composer install` and `npm install`

1.  Create database

1.  Run `cp .env.example .env`

1.  Configure `.env` file
    1. Setup database name
    1. Setup database host / ip address
    1. Setup password
    1. Check [.ENV](#env-file) section

1.  Run `php artisan key:generate`

1.  Run `php artisan migrate`

1.  Run `php artisan db:seed`

1.  Run `php artisan storage:link`

### ENV File
#### Update Mailgun
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@mg.blissbox.asia
MAIL_PASSWORD=83438ecaff590943bd015c5ac3ba6455
MAIL_ENCRYPTION=tls

MAILGUN_DOMAIN=mg.blissbox.asia
MAILGUN_SECRET=key-f52a8ef62b9ab9ad2f28829746275f81
```
#### Update Stripe
```
STRIPE_KEY=pk_test_xymjsPyeTczzF1jVgiQ7e9MC
STRIPE_SECRET=sk_test_qSTulrDC5zYVuY53EhhU4931
```
#### Update Google ReCAPTCHA
```
GOOGLE_RECAPTCHA_KEY=6LdP7isUAAAAAIYBEzj_f1e8uvuqXUGTHJeUH7UW
GOOGLE_RECAPTCHA_SECRET=6LdP7isUAAAAAIiP5v4gusAKW-qyKZ1_tWxKPiHy
```

### Now everything is ready


## Run Locally

1. `php artisan serve --port=80` OR `php artisan serve`
2. Open another tab and type `npm run watch`

# Deploying and Google Cloud Engine VM Instance Setup
### Operating System
Distributor ID:	Ubuntu
Description:	Ubuntu 17.04
Release:	17.04
Codename:	zesty

### Package To Install
How to Install

Reference
1. https://www.vultr.com/docs/how-to-install-and-configure-php-70-or-php-71-on-ubuntu-16-04
1. https://www.taniarascia.com/how-to-install-apache-php-7-1-and-mysql-on-ubuntu-with-vagrant/

First of all,

Remove all the PHP modules
```
sudo apt-get purge php.*
```

Install Package Repository
```
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update -y
```

Check the list of PHP modules
```
// Then you can list all of the available PHP 7.1-related packages for review:
apt-cache pkgnames | grep php7.1
```

Install PHP modules.
Change the version accordingly.
```
// Install PHP Modules
sudo apt-get install -y php7.1-xml php7.1-xsl php7.1-mbstring php7.1-readline php7.1-zip php7.1-mysql php7.1-phpdbg php7.1-interbase php7.1-sybase php7.1 php7.1-sqlite3 php7.1-tidy php7.1-opcache php7.1-pspell php7.1-json php7.1-xmlrpc php7.1-curl php7.1-ldap php7.1-bz2 php7.1-cgi php7.1-imap php7.1-cli php7.1-dba php7.1-dev php7.1-intl php7.1-fpm php7.1-recode php7.1-odbc php7.1-gmp php7.1-common php7.1-pgsql php7.1-bcmath php7.1-snmp php7.1-soap php7.1-mcrypt php7.1-gd php7.1-enchant libapache2-mod-php7.1 libphp7.1-embed
```

Install Apache2
```
// Install Apache2
sudo apt-get install -y apache2
```
Install MySQL Server
```
// Install Apache2
sudo apt-get install -y mysql-server
```

Restart Apache
```
sudo service apache2 restart
```

Install Composer
```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Install NodeJS
```
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs
```


##Grand user permission to edit the directory
```
sudo chown -R [USER]:[USER_GROUP] /var/www/blissbox
```

## Google Cloud VM Instance Implementation

1.  Download [Cloud SDK](https://cloud.google.com/sdk/downloads)  to create
    a project ID.

1.  Open **Terminal** and enter `gcloud compute ssh weehong@blissbox`

1.  Type `cd /var/www/`

1.  Type `sudo git clone https://github.com/Blissbox/eCommerce.git Blissbox`

1.  Type `cd Blissbox`

1.  Run `composer install` and `npm install`

1.  Create database

1.  Run `cp .env.example .env`

1.  Configure `.env` file
    1. Setup database name
    1. Setup database host / ip address
    1. Setup password
    1. Check [.ENV](#env-file) section

1.  Run `php artisan key:generate`

1.  Run `php artisan migrate`

1.  Run `php artisan db:seed`

1.  Run `php artisan storage:link`

## Google Cloud VM SSL Implementation

1. Go to Google Console and open Shell.

1. Key in `openssl req -new -newkey rsa:2048 -nodes -keyout yourdomain.key -out yourdomain.csr
           `
          
1. Download the .key into your local machine.

1. Issue your SSL by using your CSR. (Google how to implement this, it based on where you purchase the SSL)

1. Place your `ca-bundle` into `/etc/ssl`

1. Go to your virtual host `/etc/apache2/sites-available/your-virtual-host-name` and enter the following code and change according
```
<VirtualHost *:80>
    ServerName dev.blissbox.asia
    DocumentRoot /var/www/blissbox/public
    Redirect permanent / https://dev.blissbox.asia
</VirtualHost>

<VirtualHost *:443>
    ServerAdmin developer@blissbox.asia
    ServerName dev.blissbox.asia
    ServerAlias dev.blissbox.asia

    DocumentRoot /var/www/blissbox/public

    <Directory "/var/www/blissbox/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog /var/www/blissbox/logs/error.log
    CustomLog /var/www/blissbox/logs/access.log combined

    SSLEngine on
    SSLCertificateFile /etc/ssl/blissboxasia/STAR_blissbox_asia.crt
    SSLCertificateKeyFile /etc/ssl/blissboxasia/blissboxasia.key
    SSLCertificateChainFile /etc/ssl/blissboxasia/STAR_blissbox_asia.ca-bundle
</VirtualHost>
```

## Issues
1. Website Return 404 Except Homepage
```
sudo a2enmod rewrite
```

1. Cannot allocate memory
```
/bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
/sbin/mkswap /var/swap.1
/sbin/swapon /var/swap.1
```

## Things to check after `composer update` and `npm update`

1. Ensure `use Auth` and `addToCart()` has been added into `RedirectsUsers.php`

```
addToCart(Auth::user()->id);

if (method_exists($this, 'redirectTo')) {
    return $this->redirectTo();
}

if (Auth::user()->role_id == 2) {
    $this->redirectTo = '/profile';
}
```
1. Ensure Google Analytics has been implemented into `frontend/layouts/app.blade.php`
```angular2html
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PW2WT5F');</script>
<!-- End Google Tag Manager —>
```

In `<body>` tag
```angular2html
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PW2WT5F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) —>
```

1. Ensure `showLoginForm()` has the following code.

```
if(!session()->has('url.intended'))
{
    session(['url.intended' => url()->previous()]);
}
return view('auth.login');   
```

## Contributing changes

* See [CONTRIBUTING.md](CONTRIBUTING.md)

## Licensing

* See [LICENSE](LICENSE)
