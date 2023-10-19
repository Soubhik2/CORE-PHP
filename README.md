
# CORE-PHP

This is CORE PHP custom template



## Authors

- [@Soubhik2](https://github.com/Soubhik2/CORE-PHP)


## How to use ?

Fast download this and save in htdocs folder

### Change CPHP -> your folder name

`.htaccess`
```bash
Options -Indexes

RewriteEngine On
RewriteBase /CPHP/
RewriteRule ^index\\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /CPHP/index.php [L]
```

`index.php`
```bash
$pass_url = 'CPHP';
```

## Environment Variables



`BASEPATH`
`BASEURL`
`$request`
`$requests`
`$viewDir`
`$pass_url`


## Features

- Added bootstrap
- Very simple
- Easy to use


![Logo](https://cdn-icons-png.flaticon.com/128/528/528261.png)
