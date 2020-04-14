---
title: Operations
description: Vivid Operations
extends: _layouts.documentation
section: content
---

# Operations

Some times, certain jobs almost always need to run together. If, for example, you need to run an external api call before creating a resource,
then that would force you to run 2 jobs every single time that you had to create that resource.

If you were to follow this course of actions multiple times, it would make your code WET (Write Everything Twice).
Keep also in mind that you should **NEVER** call a Job from within an other Job.

Operations are used in order to DRY (Dont Repeat Yourself) up your code. 

Essentialy, Operations are a group of Jobs. Instead of calling the same Jobs
over and over again, you can group them together and then run that Operation instead. 

## Generating an Operation

```sh
./vendor/bin/vivid make:operation <operation>
```

## Anatomy of the Operation

The Operation look like a Feature. It has a `handle()` method and it has the right to call Jobs.

```php
<?php

namespace App\Operations;

use Vivid\Foundation\Operation;

class ExampleOperation extends Operation
{
    public function handle()
    {
        
    }
}
```