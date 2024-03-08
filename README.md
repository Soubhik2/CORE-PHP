
# CORE-PHP

This is CORE PHP custom template.



## Authors

- [@Soubhik2](https://github.com/Soubhik2/CORE-PHP)


## How to use ?

Please download this file and save it in the 'htdocs' folder of your XAMPP installation.

### Then change `CPHP` to your `{folder}` name.

#### This is in your project folder first `.htaccess` file.
```
Options -Indexes

RewriteEngine On
RewriteBase /CPHP/ <--- change here
RewriteRule ^index\\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /CPHP/index.php [L] <--- change here
```

#### And now change on `index.php`.
```php
$pass_url = 'CPHP';
```
### Now run your project.

## Environment Variables

`BASEPATH`
`BASEURL`
`$request`
`$requests`
`$viewDir`
`$pass_url`

#### Those are very important variables.

## Documentation

### Configurations
You can locate it in the configuration file of your project's app.


## Features

- Added bootstrap
- Very simple
- Easy to use


![Logo](https://cdn-icons-png.flaticon.com/128/528/528261.png)
