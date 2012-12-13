# WordPress Skeleton

Based on [Mark Jaquith's WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton), this repository can be used to quickly setup a new WordPress installation. What sets it apart is the ability to reuse it among all of your local/development/staging/production environments AND share databases between them.

Checkout [WordPress Skeleton's](https://github.com/markjaquith/WordPress-Skeleton) documentation for a brief overview.

## Why? And how I use this.

One of the things I continually try to perfect is my development environment. I see an ideal process like so:

1. Develop locally
2. Commit to source control
3. Automatic deployment to a staging environment
4. Manual deployment to production

This repository doesn't deal with the deployment process, but it makes it possible. Starting with this framework you can see one code-base all the way through from local to production. Let me reiterate that this includes your ENTIRE site ... WordPress and its plugins, themes, configuration, etc.

## `wp-config.php`

Since part of the reason for this repository is for WordPress to reside in a subdirectory, `wp-config.php` is one directory above `wp`.

Among the standard sort of things you expect there's a few things introduced here.

``` php
define( 'ENV_DOMAIN',			'example.com' );
define( 'PRODUCTION_DOMAIN',	'example.com' );
define( 'DOMAIN_CURRENT_SITE',	ENV_DOMAIN );
define( 'WP_HOME',				'http://'. ENV_DOMAIN );
define( 'WP_SITEURL',			'http://'. ENV_DOMAIN .'/wp' );
```

* `ENV_DOMAIN` &mdash; *required* &mdash; The domain, such as `example.com` represents the current environment domain you want to use. In `wp-config.php` this definition would be the production domain.
* `PRODUCTION_DOMAIN` &mdash; *optional* &mdash; This definition is optional *unless you are using multisite* and is used to switch the host, enabling one environment to work with a database configured for a different domain.

* `DOMAIN_CURRENT_SITE` &mdash; *optional* &mdash; This definition is optional *unless you are using multisite*.
* `WP_HOME` &mdash; *optional* &mdash; This is already set in your database, but can be overridden here.
* `WP_SITEURL` &mdash; *optional* &mdash; This is already set in your database, but can be overridden here.

## `local-config.php`

The point here is to use this file to override settings in `wp-config.php`. You'll want to use this in all environments other than production.

The same definitions from above *must* be defined in your `local-config.php` if that file exists.
