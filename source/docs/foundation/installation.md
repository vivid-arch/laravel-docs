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

Vivid has been tested only for Laravel 6.x but there is no reason that the Foundation package shouldn't be compatible with older versions of
Laravel, or ever Lumen. More tests will be performed in the future in order to ensure that Vivid is fully functional, and determine the actually
minimum compatible version of the framework.

# Integration with existing projects

Vivid is designed to play nicely with existing codebases. Once installed, it will not cause any conflicts in regards to the
classes and the routes.