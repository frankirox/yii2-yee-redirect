# yii2-yee-redirect

##Yee CMS - Redirect Module

####Backend module for managing URL redirects 

This module is part of Yee CMS (based on Yii2 Framework).

Redirect module lets you easily create URL redirects on your site. 

Installation
------------

- Either run

```
composer require --prefer-dist yeesoft/yii2-yee-redirect "~0.2.0"
```

or add

```
"yeesoft/yii2-yee-redirect": "~0.2.0"
```

to the require section of your `composer.json` file.

- Run migrations

```php
yii migrate --migrationPath=@vendor/yeesoft/yii2-yee-redirect/migrations/
```

Configuration
------
- In your backend config file

```php
'modules'=>[
	'redirect' => [
		'class' => 'yeesoft\redirect\RedirectModule',
	],
],
```

Using RedirectAction
------
RedirectAction redirects users using redirect settings.

To use RedirectAction, you need to declare an action of RedirectAction
type in the `actions()` method of your `SiteController`
class (or whatever controller you prefer), like the following:

```php
public function actions()
{
    return [
        'redirect' => ['class' => 'yeesoft\redirect\RedirectAction'],
    ];
}
```
 
After that you need to add rules:
 
```php
'rules' => [
    '<action:(redirect)>/<slug:[\w \-]+>' => 'site/redirect',
],
 ```
 
 Now all links like this `www.mysite.com/redirect/slug` will be redirected to URL that was specified in redirect record.
