---
title: Domains
description: Vivid Domains
extends: _layouts.documentation
section: content
---

# Domains

Domains are nothing more than way to logically group Jobs together based on which entities they are dealing with.

For example, the Jobs `GetActiveUserJob`, `CreateUserJob`, `DestroyUserJob` belong to the `User` domain because they are dealing with the `User` entity.

Furthermore, Domains will allow you to detect when your Jobs are doing too much work. If you can't decide in which Domain your Job belongs to,
then most likely you are dealing with multiple Domains which in turn shows that your Job is doing too much work and it should be broken in to smaller parts.

## Creating a Domain

Domains can be created when a `Job` is being created by specifying the `<domain>` argument.

```sh
./vendor/bin/vivid make:job <job> <domain>
```

You can find the Domains at the `/app/Domains` directory.

#Example use of Domains

Let's follow the example that we set with the support portal. 

We will assume that we have determined the following Jobs which will be needed for our application: 
**FetchOpenTicketsForUserJob**, **FetchAssignedTicketsJob**, **AssignTicketJob**, **MarkTicketAsClosedJob**, **FetchTicketsForUserJob** etc...

All these Jobs belong to the Tickets Domain because they are responsible for dealing with the Tickets.