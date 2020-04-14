---
title: Controllers
description: Vivid Controllers
extends: _layouts.documentation
section: content
---

# Controllers

Controllers is what we all know and love. Sometimes they are nice and slick. Other times, they get slightly out hand and they increase in size.

With Vivid, your controllers will only be a single line and that's it!

This is because the Controllers are only responsible for serving a Feature and nothing else. There is no logic in them and their difference
from a normal Laravel controller in terms of structure is the extension of the `Vivid\Foundation\Http\Controller` base class which is responsible
for implementing the `ServesFeaturesTrait`.

## Generating Controllers

In order to generate a Controller using the Vivid Console, type the following command:

```sh
./vendor/bin/vivid make:controller <controller> <device>
```

By default this command will generate a basic controller class that looks like this:

```php
<?php

namespace App\Devices\ExampleDevice\Http\Controllers;

use Illuminate\Http\Request;
use Vivid\Foundation\Http\Controller;

class ExampleController extends Controller
{

}
```

If you want to save time and generate a resource controller you can do it by using the `--resource` option. This will generate a controller that implements
the following functions: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.

It is up to you to decide how your controller structure will be. When you aren't sure, we recommend watching the ["Cruddy by Design"](https://www.youtube.com/watch?v=MF0jFKvS4SI)
talk by [Adam Wathan](https://adamwathan.me/). In summary, it is a good idea to avoid using any word for the name of a controller other than the 
standard CRUD names. But this is up to you. Vivid will not force any coding standard upon you. 