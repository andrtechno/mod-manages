# mod-manages

Module for PIXELION CMS

[![Latest Stable Version](https://poser.pugx.org/panix/mod-manages/v/stable)](https://packagist.org/packages/panix/mod-manages)
[![Total Downloads](https://poser.pugx.org/panix/mod-manages/downloads)](https://packagist.org/packages/panix/mod-manages)
[![Monthly Downloads](https://poser.pugx.org/panix/mod-manages/d/monthly)](https://packagist.org/packages/panix/mod-manages)
[![Daily Downloads](https://poser.pugx.org/panix/mod-manages/d/daily)](https://packagist.org/packages/panix/mod-manages)
[![Latest Unstable Version](https://poser.pugx.org/panix/mod-manages/v/unstable)](https://packagist.org/packages/panix/mod-manages)
[![License](https://poser.pugx.org/panix/mod-manages/license)](https://packagist.org/packages/panix/mod-manages)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

#### Either run

```
php composer require --prefer-dist panix/mod-manages "*"
```

or add

```
"panix/mod-manages": "*"
```

to the require section of your `composer.json` file.


#### Add to web config.
```
    'modules' => [
        'manages' => ['class' => 'panix\mod\manages\Module'],
    ],
```
#### Migrate
```
php yii migrate --migrationPath=vendor/panix/mod-manages/migrations
```
