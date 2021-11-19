---
title: Features
description: Vivid Features
extends: _layouts.documentation
section: content
---

# Features

As the name suggests, Features serve a specific purpose and only one Feature can be executed per request.

Think of them as the intent of the request. For example a feature may be creating a post, authorizing a user, fetching a resource, etc...

Each Feature can only call Jobs and Operations, and it should never communicate or invoke other Features.

Keep in mind that Features are Device depended, however you can also have global features that are located inside the `/app/Features` directory.

## Generating a Feature

In order to generate a Feature using the Vivid Console type the following command:

```sh
./vendor/bin/vivid make:feature <feature> [<device>]
```

If you do not specify a Device name the feature will be considered a global, and it will be placed inside the `/app/Features` directory.
Otherwise, the feature will belong to a Device, and it will be placed inside the `/app/Devices/<device name>/Features` directory respectively.

## Anatomy of the Feature

A newly created feature will look like this:

```php
<?php

namespace App\Devices\Example\Features;

use Vivid\Foundation\Feature;
use Illuminate\Http\Request;

class ExampleFeature extends Feature
{
    public function handle(Request $request)
    {
    }
}
```

All the magic happens inside the `handle()` method. This is where you will call Jobs and Operations from.

## Serving a Feature

Now that you have created a Feature, how do you use it?

As mentioned before, each Vivid Controller has access to the `Vivid\Foundation\ServesFeaturesTrait` which provides the `$this->serve()` method.
This trait dispatches the execution of the Feature, and it also registers the Feature class FQN to the `Vivid\Foundation\Instance` class.

Here is an example using the Device Controller that serves a feature:

```php
<?php

namespace App\Devices\ExampleDevice\Http\Controllers;

use Illuminate\Http\Request;
use Vivid\Foundation\Http\Controller;

use App\Devices\Feature\ExampleFeature;

class ExampleController extends Controller
{
    public function index()
    {
        return $this->serve(ExampleFeature::class); 
    }
}
```

## Passing Parameters

If you want to pass parameters when serving a feature you can do it by passing an associative array as a second parameter to the `serve()` method.

Here is an example of how that looks like:

```php
[...]

public function index()
{
    return $this->serve(ExampleFeature::class, [
        'arg1' => 'value 1',
        'arg2' => 'value 2'
    ]); 
}

[...]
```

In order to accept these parameters from within our `ExampleFeature` class, we need to do the following:

```php
[...]

class RetrievesAllUsersFeature extends Feature
{
    
    public function __construct($arg2, $arg1)
    {
        // set the arguments as class properties
    }

    public function handle(Request $request)
    {
        // handle
    }
}

```

You will notice that the order of the arguments doesn't match the order by which we passed them in. 
That's because Vivid does not care about the order of the arguments at all as long as the names are the same.

## Example of using a Feature

Following the example that we introduced in the chapter about Devices, let see how we can determine which Features our application needs.

The easiest to understand, and most universal concept is the one of the support portal. Virtually all services have the same functionality 
when it comes to handling support tickets. 

So, lets write down what we expect when think about a support portal. Definitely we need to be able to **create a new ticker**, **add media tou our ticker**,
**add replies**, **mark it as closed**, and from the admin panel wou should have the ability to **assign the ticker**, **escalate it**, **updated the status**.

Let's keep it simple for now and assume that these are all the things that we want to do when it comes to the support portal. 

That leaves us with the following Vivid Features:

+ CreateNewTicketFeature
+ AddMediaToTicketFeature
+ AddReplyToTicketFeature
+ MarkTicketAsClosedFeature
+ AssignTicketFeature
+ EscalateTicketFeature

The next step is to use the console and generate these features. Once we have done that, we can move on and start writing our jobs.