---
extends: _layouts.post
section: content
title: What did you intend? Pt. 3
date: 2022-05-26
description: Finally time to talk naming things.
cover_image: /assets/img/intention.png
featured: false
categories: [code-quality]
---

We are finally at variable  and function names.  This isn’t an intended destination, but it is an unavoidable topic that always needs to be addressed.  It’s often the case when I’m working on a bit of code, I spend longer trying to figure out the variable names than I do figuring out the logic of the code.  It’s such a strange phenomena that people who are primarily concerned with logic and order could get stuck on word choice, but that is often the state we find ourselves in.

There are some principles that really help and we are about to work through some of the major ones, but there is also a goal that overrides all of them.  The end goal is that when someone else reads the code, they get the correct mental model of what you are doing.  The intention of the code becomes clear.  When they see your choices with variable or function names, they know what is being stored or accomplished.

The first principle you should use is apply the conventions of your code base. If everyone 
names the results of the query “results” or even “res”, you shouldn’t break the convention.  
I don’t personally like that convention, but if that is how a codebase reads, I would use it 
to maintain readability.  That’s more important than winning a point about clarity.  We read 
code more than we write it, and if people are expecting to see “res” and instead they see 
“widgetRawData” they are going to stop and try to figure out if you are doing the same thing 
everyone else did.

The second principle is that terse names should only be used for simple painfully obvious things.  
If I pass a group of users to the front end, I’m tempted to call it users.  But if there are other 
users on the page, this immediately becomes confusing. Maybe a wiki page has a list of commenters 
and thread authors that stored in two different lists.  Users and users2 would just be rude to 
figure out.  You want people to get the context immediately.  You also never know when someone wants 
to add something really similar.  If I had called the thread authors “users” and then I had to add 
commenters to the page as a later step, the “users” suddenly looks inadequate and weak.  If I choose 
good names, when I add moderators later, everything will appear seamless.

A lot of times, two words for names are better than one.   It bumps up the specificity and helps 
avoid some awkward moments.  Picture a javascript front end sending calls to the back end for 
standard CRUD operations.  You have a save method, fine.  Your edit method looks tight.  But then 
you get to delete.  Delete is often a keyword and should probably be avoided.  So your methods end 
up being add, edit, update, and deleteEntry. While slightly more verbose, addWidget, updateWidget, 
and deleteWidget looks a lot more consistent and intentional.  This rule doesn’t always apply.  If 
your code base used idx for index, or i for a loop iterator, there is no reason to go another 
direction with it.  People will know what it means, just as you do when you read the code they 
write. It is still worth taking a moment to consider whether things are clearer with two word 
variable names.

This is going to sound a bit counter to the previous points, but often you can shorten names by 
using the context around it as well.  The secret to the shortening is that it’s already obvious by 
the situation you’re in.  If you are working in the widget class, a create function is fine. 
`widget.updateWidget()` almost seems silly.  If it reads better without the extra words and it’s 
consistent, go with the simplest solution.

My personal process is to first get the code working before I think about naming functions. If a name doesn’t immediately jump into my head, I use names like “thisThing”, “doSomething()”, or “whatever” while I’m writing the code because I’m not sure what I want to call it yet, and I want to get the logic organized before I worry about what to call the variables or functions names.  Then it comes down to an iterative approach.  I refactor the name, look at it again and think about whether or not it’s conveys what I think it should, and repeat the process until I’m satisfied I’ve got it.
