---
title: Views
description: Vivid Views
extends: _layouts.documentation
section: content
---

# Views

Following the isolation philosophy of the Devices with their own set of Routes, you may have views that belong to a specific Device.

Each view is namespaced, and consequently has to be called using the name of the device as it's namespace.

Example:

```php
view('<device name>::user.index')
```

The directory structure would look like this:
```
/resources
    /<device name>
        /js
        /lang
        /sass
        /views
            /user
                index.blade.php
```