---
title: Getting Started
description: Getting started with Laravel Vivid
extends: _layouts.documentation
section: content
---

# Vivid

[![Latest Stable Version](https://poser.pugx.org/vivid-arch/laravel-foundation/v/stable)](https://packagist.org/packages/vivid-arch/laravel-foundation)

>adjective: producing powerful feelings or strong, clear images in the mind.

Vivid is a clear and concise way to structure your code. It works **with** the framework and not against it. It's an extension of Laravel that adds value and does not change the standard conventions. 

---------

![Vivid Arch](/assets/images/intro-arch.png)

---------

Vivid began as a fork of Lucid, which was released by VineLabs in 2016, but it took a different approach. 
Like with the original package, the goal is to write efficient, clean code that will never have to become *"that legacy part"* of the application.

In essence, your controllers will only call and serve a single Feature, your Features will call multiple Jobs. Your Jobs are reusable, testable
and separated in to Domains. Jobs that are usually called together can be grouped in to an Operation. 
Your application may have multiple entry points acting like I/O Devices.

---------

![Vivid Arch](/assets/images/stack.png)

---------

## Packages

+ [vivid-arch/laravel-foundation](https://packagist.org/packages/vivid-arch/laravel-foundation)
+ [vivid-arch/laravel-console](https://packagist.org/packages/vivid-arch/laravel-console)
+ [vivid-arch/laravel-ignition-tab](https://packagist.org/packages/vivid-arch/laravel-ignition-tab)
+ [vivid-arch/laravel-dashboard](/docs/dashboard/getting-started) (WIP)

## Copyright (MIT License)

Copyright 2019, Meletios Flevarakis <m.flevarakis@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

Copyright for portions of project lucid-foundation are held by VineLab, 2016 as part of Lucid Architecture.
All other copyright for project Vivid Architecture are held by Meletios Flevarakis, 2019.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Versioning

1. MAJOR version when incompatible API changes are made
2. MINOR version when functionality is added in a backwards compatible manner
3. PATCH version when backwards compatible bug fixes are made

All Vivid packages will have the same minor version number.