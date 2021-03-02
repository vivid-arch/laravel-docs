---
title: Events
description: Vivid Events
extends: _layouts.documentation
section: content
---

# Events

By default, Vivid will broadcast events when Features and Jobs are invoked.

You can hook on these events like you would in any other Laravel event. The trigger happens inside `Vivid\Foundation\ServesFeaturesTrait` for the Features, and 
inside the `Vivid\Foundation\JobDispatcherTrait` for the Jobs.

Please keep in mind that in most cases, relying on events to add logic to your application can be considered an anti-pattern. Be cautious when using them.

The recommended way to use the Events is for support actions that are not integral to the application.

Classes:

### `Vivid\Foundation\Events\FeatureStarted`

```php
class FeatureStarted
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $arguments;

    /**
     * FeatureStarted constructor.
     *
     * @param string $name
     * @param array  $arguments
     */
    public function __construct($name, array $arguments = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }
}
```

### `Vivid\Foundation\Events\JobStarted`

```php
class JobStarted
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $arguments;

    /**
     * JobStarted constructor.
     *
     * @param string $name
     * @param array  $arguments
     */
    public function __construct($name, array $arguments = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }
}
```

## Turning off event broadcast

If you wish to disable the broadcast of events, you may set the `'broadcast_events'` config element to `false` inside the `config/vivid.php` file.