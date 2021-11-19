---
title: Instance Class
description: Vivid Instance Class
extends: _layouts.documentation
section: content
---

# Instance Class

The Vivid Instance class is a simple PHP Object that binds to the Laravel Container with the form of a singleton.
It is automatically registered by the `Vivid\Foundation\VividServiceProvider` class:

The purpose is to store information regarding the runtime of the application.

Here is what this class contains:

+ **The controller FQN**
+ **The feature that is being served**
+ **An array with all the Jobs**
+ **An array with all the Operations**

Most likely you will never have to use this class unless you are building a custom integration with a tool like Bugsnag.