---
extends: _layouts.post
section: content
title: Start Here!
date: 2022-05-01
description: Some quick tips on how to use this site.
cover_image: /assets/img/start-button.png
featured: true
categories: [starting-point]
---

## Here's what we are trying to do.

These letters are intentionally ordered.  It's better if you start 
at the beginning and go through the letters in order. This isn't 
the kind of material that gets outdated.  Here's the rough idea of 
this website through code.

```javascript
// Initialize New Career
const listOfNeededSkills = [ 
    'coding-ability', 'coding-style', 'coding-environment-setup', 
    'version-control', 'ide', 'company-culture', 'effort',
    'team-relationships', 'company-values', 'department-rules', 
];
 let calculateScoreAtNewJob = ((lessonsLeared) => {
     return lessonsLeared.reduce((acc, lesson) => {
         if (listOfNeededSkills.includes(lesson)) {
             acc += 1 / listOfNeededSkills.length;
         }
         return acc;
     }, 0) * 100;
});
```

> **Note:**
> The listOfNeededSkills isn't close to exhaustive.  It's just to start the idea.
> There are so many things going on when you start your job, that you can't keep all of them in your head at the same time.
> 
> If you aren't into javascript or haven't seen the reduce method before, all this
> is trying to say is there is a lot to learn when you are starting your career.

As someone who has watched plenty of new people start their careers, I've seen the problems you will likely encounter.  I want to give you some reminders of things you probably know, but in the overwhelming mess that is starting a new job, you might have overlooked. 
