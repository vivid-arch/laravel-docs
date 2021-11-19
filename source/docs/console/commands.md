---
title: Console Commands
description: All the commands contained inside the Vivid Console
extends: _layouts.documentation
section: content
---


# Commands

```text
Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help                        Display help for a command
  list                        List commands
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