---
title: Jobs
description: Vivid Jobs
extends: _layouts.documentation
section: content
---

# Jobs


Jobs are where most of the magic happens. They are responsible for doing a certain task and they are reusable througout the application.

Jobs should only be doing one and only thing. For example, a `FetchActiveUsersJob` should do what it's name implies. Similarly the Feature should be broken down to
individual jobs. If you were to have a `SavePostFeature` you should think what smaller steps need to be taken in order to accomplish that task.

Unlike Features, Jobs are not Device-spicifc and they reside inside the `/app/Domains/<domain>/Jobs` directory. One important characteristic of the Jobs is that they are
completely isolated and they should only ever talk to the core application or other external services. Most importantly, Jobs should never talk to other jobs.

## Generating a Job

**Basic use**

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

By default, the Job will conntain 2 functions, the `__construct` and the `handle` function. You will have to use the constructor in order to
accept parameters to the Job, and the handle function to put inside the main Job logic.

## Running Jobs

To run a job you have to use the `$this->run()` method from within a Feature, which is made available by the `Vivid\Foundation\JobDispatcherTrait` which, in turn,
is implemented by the `Vivid\Foundation\Feature`.

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
        $this->run(ExampleJob::class);
    }
}

```

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

In order to accept these parameters from the Job class you have to do the following:

```php
[...]

class ExampleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param1, $param2)
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

Please note that the order of the parameters does not matter here either. The key of the associative array however has to match the name of the parameter.
