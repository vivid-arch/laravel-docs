---
title: Logging
description: Vivid Logging
extends: _layouts.documentation
section: content
---

# Logging

Vivid Jobs can write to log by using the `$this->log()` method from anywhere within a Job.

Under the hood Vivid uses the `Log` facade and prepends the output with the Job FQN
but there are future plans to make the logging more powerful by allowing developers to
use different logging channels.

## Using the logger

From within a job you can use the following methods:

+ `$this->log()->debug(string $message)`
+ `$this->log()->info(string $message)`
+ `$this->log()->notice(string $message)`
+ `$this->log()->warning(string $message)`
+ `$this->log()->error(string $message)`
+ `$this->log()->critical(string $message)`
+ `$this->log()->alert(string $message)`
+ `$this->log()->emergency(string $message)`

## Sending Vivid to a custom channel

You have the ability to also use a dedicated channel for Vivid.
Inside the `config/vivid.php` file you may set the `'log_channel'` value to whatever you like.

Keep in mind that this will only work if you use the Vivid log helper (`$this->log()->`)