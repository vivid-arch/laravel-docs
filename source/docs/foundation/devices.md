---
title: Devices
description: Vivid Devices
extends: _layouts.documentation
section: content
---

# Devices

Think of a Device as a generic I/O device. It is responsible for either inputting data or outputting data for a given system.

The structure of the Devices is similar to the default Laravel structure that we are used to seeing.
Each one of them is responsible for providing an interface with our application. They have their own set of Controllers, Routes and Features.

Each Device **must** be independent of the others, and it should be able to function on its own without the existence of the other devices.

It is of curse acceptable for Devices to use any component from our application that is located outside the `/Devices` directory.

### Generating a Device

In order to generate a Device using the Vivid Console type the following command:

```sh
./vendor/bin/vivid make:device ExampleDevice
```

Sometimes, you may want to omit the creation of the resource folders inside `/resources/devices`. You may do that by appending the `--no-assets` option at the end of the command.

### Registering a Device

Be default, Devices do not get registered automatically. Once generating one you will have to add the Service Provider namespace inside the `devices` array located in `/config/vivid.php`.

You can also toggle which devices will be loaded by the application by adding `true` or `false` to each Device. For example:

```php
//Will be registered:
'devices' => [
    'App\Devices\Example1\Providers\ExampleServiceProvider',
    'App\Devices\Example2\Providers\ExampleServiceProvider' => true
]

//Will not be registered:
'devices' => [
    'App\Devices\Example1\Providers\ExampleServiceProvider' => false
]
```

TIP: You can also use environment variables to control when the devices will be loaded. For example, you can disable certain devices on production.

### Directory Structure

```
/app
    /Devices
        /ExampleDevice
            /Console
            /database
            /Features
            /Http
            /Providers
            /routes
            /Tests
```

### Routing

Each Device gets it's own set our routes. When generating a Device, the routes will be registered automatically by the `RouteServiceProvider` located at `/app/Devices/<device name>/Providers/RouteServiceProvider`.

By default, you will have a `web.php` and an `api.php` file which you will use accordingly. The routes inside these will be prefixed with `/api/<device>/` and `/<device>/` respectively.

### Example of using Devices

Let's consider the following scenario:

> You are building a SaaS app which has the following features: a homepage with all the marketing material, 
> a blog to keep your clients updated, a client area which is where your clients are doing all the work, 
> and an admin panel which you will use to manage the website.

All these segments need to be separated in to smaller chunks. In most cases, it will be very easy to distinguish which these parts are
simply by taking a look at your application's different business segments. 

In our case, we can decide to split the application in to the following segments:

+ Homepage
+ Blog
+ Client Area
+ Admin Area

These segments can be easily converted to different devices and that would be a correct thing to do, but in most cases we need to look
deeper to see if we end up creating super-devices which are still containing too much code which could be broken ever further.

To give a clear illustration of what we mean by that, lets assume that the client are has a support portal. Indeed, it is contained 
inside the client area but doesn't it look like a business segment of it's own? Well, yes, and we can think of it as an independent entity. 

By closely examining our application, or what we need to build, we can identify it's different business segments and use them to create
our set of devices that we are going to use.

Using what we have now in this example, we find the following list of devices: **Homepage**, **Blog**, **Admin Area**, **Client Area**, **Support Portal**

So, lets recap! 
We found the logical areas that we can use to derive the devices that we are going to need in order to build the application.

The next step if to generate these devices, and we will start implementing them as we go along.