---
title: Instance Class
description: Vivid Instance Class
extends: _layouts.documentation
section: content
---

# Instance Class

The Vivid Instance class is a simple PHP Object that binds to the Laravel Container with the form of a singleton.
It is automatically registered by the `Vivid\Foundation\VividServiceProvider` class:

```php
public function register()
{
    $this->app->singleton('Vivid\Foundation\Instance', function ($app) {
        return new Instance();
    });
}
```

It's purpose is to store information regarding the runtime of the application.

Here is what this class contains:

+ **The controller FQN**
+ **The feature that is being served**
+ **An array with all the Jobs**
+ **An array with all the Operations**