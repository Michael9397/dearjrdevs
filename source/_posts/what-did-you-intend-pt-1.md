---
extends: _layouts.post
section: content
title: What did you intend? Pt. 1
date: 2022-05-12
description: How clearly can people read your code?
cover_image: /assets/img/intention.png
featured: false
categories: [code-quality]
---

There are a lot of perspective shifts a new developer needs to make.  When you learn and work by yourself, the consequences are different.  If you do something sloppy in your version control, only you read it normally.  If you add in a package to your project, only 1 person has to learn it. If you get an ugly piece of logic to work, you can walk away from it and leave it alone.  Other than code found on Stack Overflow, you don’t have to work with code someone else produced.  All of the sudden, in a team environment, things look different.

You are reading code that was written by people who may or may not be around to ask questions to.  Your code all of the sudden is seen by other people who are judging it for not whether or not it works, but does it convey it’s intentions well.  Maybe you write or come across something like this...

```javascript
extension = 3 * 86400;
reminder = 4 * 604800;
```

Maybe you have worked with time enough that you recognize those numbers.  Maybe not...  You have to start asking yourself if it’s reasonable for other people to know what those numbers are.  For those of you who can’t let it go until you understand, those are the number of seconds in a day and in a week. All of the sudden, someone is going to have to touch that work again in maybe 3 months,  6 month or even longer possibly.  But when you or someone else goes back to it, they need to see what you thought.

This isn’t a lesson on variable names or not having magic values in your code.  It’s broader than that.  You want someone else to be able to read what you are doing and have it make sense to them.  You want it to look enough like the code surrounded it, that it logically fits in when someone analyzes the the code next time.  If everyone uses long descriptive names, and you use terse ones, it will look out of place.  If everything else is broken into small functions and you have a huge one, it will look wrong to everyone else.  It’s possible that a long function is still the best answer in that situation but it’s a long shot.

It’s really tempting to give you all of my personal preferences for how I like the code to look, but it’s the wrong choice and I have to put my ego aside.  It’s also what I’m asking you to do.  I have to remind myself that the goal isn’t that it makes me happy.  The goal is readability and cohesion with its surroundings.  Of course it has to work too.  But if it works, that doesn’t mean you are done working on it yet.

```jsx
function buildARobot(parts) {
    partsToWeld = parts.filter(p => p.type === 'weld');
	weldedParts = weldParts(partsToWeld);

	partsToBolt = parts.filter(p => p.type === 'bolt');
    boltedParts = boltParts(partsToBolt);
    
	robot = assembleParts(weldedParts, boltedParts);
	return polishRobot(robot);
}
```

In this nonsense bit of code, hopefully you can see how clear it is to follow the pattern.  Other than learning I have no idea how to actually build a robot, you can see what is supposed to be happening at each step of the way.  The filtering lines show you that a bit of work that happens in that class isn’t the end of the world as long as it reads well.  These functions could be inlined and it would still work.  Perhaps they average 50 complex lines of code each.  Maybe you have a sense of efficiency that says you would save 3 function calls.  But imagine having to dig through that rather than finding out there was a problem with the boltedParts.  Now you know where to look.  It’s easy to chase down.

Make sure whoever comes behind you can see your intentions as clear as possible.
