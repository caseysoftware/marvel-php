
The Unofficial Marvel PHP Library
==========

This is a helper library for the Marvel Comics API - http://developer.marvel.com/

All characters - no matter how awesome they are - are owned by Marvel Comics. Also, if you use this library, make sure you follow their attribution rules: http://developer.marvel.com/documentation/attribution

## Ongoing Development

This PHP library is no longer maintained here. You can still download and install it via Composer as described below.

If you want to make requests, changes, or have suggestions, visit this repository on Gitlab:

https://gitlab.com/CaseySoftware/marvel-php

### Installing via Composer

The recommended way to install the Marvel library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add the library as a dependency
php composer.phar require caseysoftware/marvel-helper ~2.0
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/marvel-helper": "~2.0"
    }
}
```

Then install via Composer:

```bash
composer install
```

Finally, require Composer's autoloader in your PHP script:

```php
require __DIR__.'/vendor/autoload.php';
```