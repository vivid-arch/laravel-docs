---
title: Jobs
description: Vivid Jobs
extends: _layouts.documentation
section: content
---

# Jobs

Jobs are where most of the magic happens. They are responsible for doing a certain task, and they are reusable throughout the application.

Jobs should only be doing one and only thing. For example, a `FetchActiveUsersJob` should do exactly what the name implies. 
Similarly, the Feature should be broken down to individual jobs. 
If you were to have a `SavePostFeature` you should think what smaller steps need to take place in order to accomplish that task.

Unlike Features, Jobs are not Device-specific, and they reside inside the `/app/Domains/<domain>/Jobs` directory. 
One important characteristic of the Jobs is that they are completely isolated, and they should only ever talk to the core application or other external services. 
Most importantly, Jobs should never talk to other jobs.

Furthermore, you should accept Job parameters in such a way which should allow Jobs to be executed in a non-HTTP context too.

## Generating a Job

**Basic use**

To generate a Job, use the following command:
```sh
./vendor/bin/vivid make:job <job> <domain>
```

## Anatomy of the Job

```php
<?php

namespace App\Domains\ExampleDomain\Jobs;

use Vivid\Foundation\Job;

class ExampleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
    }
}

```

By default, the Job will contain 2 methods, the `__construct` and the `handle`. You will use the constructor in order to
accept parameters, and the handle method to place inside the main Job logic. 
If you wish you may add your own methods to clean up the `handle` method. 

## Running Jobs

To run a job you will use the `$this->run()` method from within a Feature, which is made available by the `Vivid\Foundation\JobDispatcherTrait`.

Here is an example:

```php
<?php

namespace App\Devices\ExampleDevice\Features;

use Vivid\Foundation\Feature;
use Illuminate\Http\Request;

use App\Domains\ExampleDomain\Jobs\ExampleJob;

class ExampleFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(ExampleJob::class);
    }
}

```

Sometimes you may wish you run a Job if a certain condition is met. Vivid provides 2 support methods which can help you with that.

+ `$this->runIf(boon $condition, string $job, array $args)`
+ `$this->runUnless(boon $condition, string $job, array $args)`

## Passing Parameters

You can pass parameters similar to how you would do it with Features.

The `$this->run()` method will accept an associative array as a second parameter and will inject the values
to the constructor of the Job.

```php
[...]

public function handle(Request $request)
{
    $this->run(ExampleJob::class, [
        'param1' => 'value',
        'param2' => 'value'
    ]);
}

[...]
```

In order to accept these parameters from the Job class you will do the following:

```php
[...]

class ExampleJob extends Job
{
    private $param1;
    private $param2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param1, $param2)
    {
        $this->param1 = $param1;
        $this->param2 = $param2;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // use the parameters from within here
    }
}

```

If you are running PHP8 you can use the [Constructor Property Promotion](https://stitcher.io/blog/constructor-promotion-in-php-8) in order to reduce the number of lines written. Given our
previous example, it can be written as:

```php
class ExampleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private $param1, private $param2)
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // use the parameters from within here
    }
}
```

You can read more about Constructor Property Promotion in the [official RFP](https://wiki.php.net/rfc/constructor_promotion).

Please note that the order of the parameters does not matter here either. The key of the associative array however has to match the name of the parameter.

## Returning data from Jobs

In most cases you need to return whatever the result of the Job is. The `run` method will return whatever `handle` returns.

Here is an example:

**Feature:**
```
$data = $this->run(ExampleJob::class, [
    'param1' => 'value',
    'param2' => 'value'
]);
```

**Job:**
```php
public function handle() {
    // whatever $data is....
    return $data;
}
```

## Cacheable Jobs

It is also possible to implement automatic caching for Job. Basically, the Vivid job dispatcher
will take the result of the Job and add it to the default caching driver. 

To make a Job cacheable, you need to implement the following interface: `Vivid\Foundation\Contracts\Cacheable`.

This interface is responsible for requesting 2 essential pieces of information: What the key is & how long to cache.

```php
public function getCacheKey(): string;

public function getCacheExpiration(): int;
```

For convenience, Vivid includes a trait out of the box which can use a set of default values 
in order to provide a definition for the `getCacheKey` and `getCacheExpiration` methods.
Simply use the `Vivid\Foundation\Contracts\Cacheable` trait. 

The `getCacheKey` method will return the class FQN of the Job and the `getCacheExpiration` will
return the value of `default_cache_duration` which is located in `config/vivid.php`.