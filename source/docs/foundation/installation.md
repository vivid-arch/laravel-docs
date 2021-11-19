---
title: Foundation Installation
description: Installing the Vivid Foundation
extends: _layouts.documentation
section: content
---

# Installation

To install the Foundation package, which is mandatory for Vivid to exist, type the following command inside the root directory of your project:

```
composer require vivid-arch/laravel-foundation
```

This will only pull the core package and **NOT** the console generator. It is the only package which is required for production.

# Publishing the Configuration

Vivid requires you to publish the `vivid.php` config file in order to be able to register the Devices. You can do that by typing `php artisan vendor:publish` and then selecting the `vivid.php` file. 

# Compatibility

Vivid has been tested only for Laravel 8.x and PHP versions 7.4 and 8.x. It has not been tested with Laravel 7.x, but we would recommend upgrading to Laravel 8 for other reasons too.

# Integration with existing projects

Vivid is designed to play nicely with existing code bases. Once installed, it will not cause any conflicts in regard to the
classes and the routes.