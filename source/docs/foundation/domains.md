---
title: Domains
description: Vivid Domains
extends: _layouts.documentation
section: content
---

# Domains

Domains are nothing more than way to logically group Jobs together beased on which models or entities they are dealing with.

For example, the Jobs `GetActiveUserJob`, `CreateUserJob`, `DestroyUserJob` belong to the `User` domain because they are dealing with the `User` entity.

Furthermore, Domains will allow you to detect when your Jobs are doing too much work. If you cant decide in which Domain your Job belong to,
then most likely you are dealing with multiple Domains which in turn shows that your Job is doing too much work and it should be broken in to smaller parts.

At that point you may have to create an Operation and call the Jobs together if that makes sense for your use case.

## Creating a Domain

Domains can only be created when a `Job` is being created by specifing the `<domain>` argument.

```sh
./vendor/bin/vivid make:job <job> <domain>
```

You can find the Domains at the `/app/Domains` directory.