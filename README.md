[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/caseysoftware/marvel-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/caseysoftware/marvel-php/?branch=master) [![Code Climate](https://codeclimate.com/github/caseysoftware/marvel-php/badges/gpa.svg)](https://codeclimate.com/github/caseysoftware/marvel-php)

The Unofficial Marvel PHP Library
==========

This is a helper library for the Marvel Comics API - http://developer.marvel.com/


This isn't official but should generally work except for the incomplete items in the TODO list below.

All characters - no matter how awesome they are - are owned by Marvel Comics. Also, if you use this library, make sure you follow their attribution rules: http://developer.marvel.com/documentation/attribution

### Installing via Composer

The recommended way to install the Marvel library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add the library as a dependency
php composer.phar require caseysoftware/marvel-helper ~1.1
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/marvel-helper": "~1.1"
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

## Requirements

This uses Composer and namespaces so PHP 5.3.x is the minimum version. I'd suggest you use something more recent but that's up to you.

## TODO

*  ~~Refactor to use Guzzle instead of curl, etc directly~~
*  ~~Implement Character List and pagination~~
*  ~~Implement the optional parameters for the Character List~~
*  ~~Implement Character Load~~
*  ~~Implement Character's comic lookup, events lookup, stories lookup~~
*  ~~Implement Comic List and pagination~~
*  ~~Implement the optional parameters for the Comic List~~
*  ~~Implement Comic Load~~
*  ~~Implement Comic's character lookup, creators lookup, events lookup, stories lookup~~
*  ~~Implement Creators List and pagination~~
*  ~~Implement the optional parameters for the Creator List~~
*  ~~Implement Creator Load~~
*  ~~Implement Creator's comic lookup, events lookup, stories lookup~~
*  ~~Implement Event List and pagination~~
*  ~~Implement the optional parameters for the Event List~~
*  ~~Implement Event Load~~
*  ~~Implement Event's character lookup, comic lookup, creator lookup, stories lookup~~
*  ~~Implement Series List and pagination~~
*  ~~Implement the optional parameters for the Series List~~
*  ~~Implement Series Load~~
*  ~~Implement Series' character lookup, comic lookup, creator lookup, event lookup, stories lookup~~
*  ~~Implement Stories List and pagination~~
*  ~~Implement the optional parameters for the Story List~~
*  ~~Implement Story Load~~
*  ~~Implement Stories' character lookup, comic lookup, creator lookup, event lookup~~

## Notes

*  The character name search doesn't support wildcards but you can use terms like 'nameStartsWith' to perform more interesting searches like finding every instance of 'Spider-Man' by just using 'Spider'.
*  So far the optional parameters have no validation in this library... I'm not sure if it should occur here as it may break later versions of the API as those requirements change.
