---
title: Console Commands
description: All the commands contained inside the Vivid Console
extends: _layouts.documentation
section: content
---


# Commands

```text
Vivid Console 0.5.2

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help                        Displays help for a command
  list                        Lists commands
 list
  list:devices                List the devices in this project.
  list:features               List the features.
 make
  make:controller             Create a new Controller class in a Device
  make:device                 Create a new Device
  make:feature                Create a new Feature in a device
  make:job {--Q|queue}        Create a new Job in a domain
  make:operation {--Q|queue}  Create a new Operation
  make:request                Create a Request in a specific device.

```