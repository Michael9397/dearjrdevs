---
extends: _layouts.post
section: content
title: What did you intend? Pt. 2
date: 2022-05-19
description: How clearly can people read your code?
cover_image: /assets/img/intention.png
featured: false
categories: [code-quality]
---

Have you ever seen this idea on a t-shirt?

```
The following statement is true.
The previous statement is false.
```

I’ve spent more time than I care to admit trying to figure out which if either of these can be correct.  The truth is the intention is confusing because it’s meant to be confusing.  Let’s look at some code and see if we can have a bit more clarity.

```jsx
// Style 1
let scores = [];
list.forEach(listRow => {
	score = getScore(listRow.records);
    scores.push(score);
});

// Style 2
let scores2 = list.map(listRow => {
    return getScore(listRow.records);
});
```

These two functions do the same thing.  They get an array of scores from some list.  
Both are immutable and the size difference between the two is negligible.   Are two 
lines of code really worth reading this article?  It’s actually worse than that, 
what I really intend is to only talk about is only the difference of a single word 
in each.

If you don’t use the functional methods (like filter, map, reduce) than this one 
might be harder to grasp, but it’s worth learning the intentions of the functions.  
When you understand what the functions are intending to do, style 2 becomes the 
obvious choice.  If I was working on a code base that avoided the functional 
methods, I still wouldn’t use style 1.  I would use a “for of” loop.

The idea behind forEach is that it doesn’t return anything.  It’s meant to process and 
then not return a result.  If you console.log an array using the forEach method you 
would get an undefined (i.e. `console.log(myArr.forEach(...)`).  The intention of a forEach method is that it is a void call. 
Using it to build up a new value feels wrong to me.  It causes a collision point in 
my mind.  My brain has to stop and process whether or not what is happening there 
works because it’s doing something that doesn’t fit with its intention.

```jsx
list.map(listRow => {
	console.log(listRow.records);
});
```

This is equally wrong.  It works, but it’s wrong.  When I see the map function my 
brain tells me that the purpose of a map function is to return an altered array 
from the original.  Maybe it’s just a score, maybe it’s an extra piece of data 
included, but it’s returning a new set of data.  If you console.log the 
`list.map()` when it has a proper return statement, you expect to see an array 
of values.  Your brain still has to process why map doesn’t have a return.
Ultimately it just slows you down a bit.

These mistakes catch your eye the same way as a typo in a variable name stands 
out.  Ultimately, when someone else reads your code to understand what you’re 
doing, they will stop the process what they are seeing for a minute and not be 
able to look through your code as smoothly.  Such a seemingly small thing erodes 
confidence that your code is going to work correctly.

A solid step towards maturing as a developer is to have clear intentions with 
your choice of methods and your code in general.
