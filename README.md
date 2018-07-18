# Riimu's PHP Coding Standards Fixer Config  #

Most of my projects use a very consistent set of coding standards rules and project hierarchy. Rather than
copying the same `.php_cs` file across different projects and then trying to figure out which project had
the latest copy, I've created this composer package as a way to include the same set of rules into every
project via composer.

These standards are based on the community's best practices and PSR standards in addition to what I personnally
consider good taste. You may freely use this configuration if you want, but do note that it may change and evolve
as time passes since I reserve the right to change my mind.

[![Travis](https://img.shields.io/travis/Riimu/php-cs-fixer-config.svg?style=flat-square)](https://travis-ci.org/Riimu/php-cs-fixer-config)

## Usage ##

To add these rules into your project, you should first include them via composer as dev dependency using

```
$ composer require --dev riimu/php-cs-fixer-config
```

Then you should create a file named `.php_cs` in your project root directory that simply contains

```php
<?php

return require __DIR__ . '/vendor/riimu/php-cs-fixer-config/config.php';
```

The rules from the config will now be applied to files inside `src` and `tests` directories (if they exist),
when you run php-cs-fixer normally in the project root, e.g.

```
$ php-cs-fixer fix --dry-run -v --diff --diff-format=udiff
```

## Credits ##

This package is Copyright (c) 2018 Riikka Kalliomäki.

See LICENSE for license and copying information.
