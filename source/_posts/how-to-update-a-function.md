---
extends: _layouts.post
section: content
title: How to update a function
date: 2022-05-24
description: This technique can save some embarrassment.
cover_image: /assets/img/planning.png
featured: false
categories: [code-quality]
---
Pretend there is a table of calendar events on your website that is driven by JavaScript.  Turns out this calendar is getting too long to be read easily and something needs to change.  The change is going to be tabs that when people click on them filter the results to a category of the calendar.  You start doing your research and come across this function.

```jsx
const buildCalendarRecords = (data => {
	return data.calendar.map(row => {
			return {
				 event: row.title,
				 startDate: row.start_date,
				 endDate: row.end_date,
	       type: row.is_virtual
			}
  });
});
```

After you look through the code and understand how things are passed back and forth you decide this is the right place to add your changes.  There is a key principle here that save you from a few potential headaches.  Don’t change the functionality for the basic use case.  Another way of saying it is that everywhere this function is already used should work the same way when you are done with it.  Only when you pass in new arguments, should it change.   If it works different in other places and gets through your company’s QA/testing process, it will usually be found by a customer who needed something to be different and the pressure will be on at that point to fix it quickly.

Let’s start with the wrong approach.

```jsx
const buildCalendarRecords = ((data, flag) => {
	return data.calendar
		.filter(row => data.category === flag)
		.map(row => {
			return {
				 event: row.title,
				 startDate: row.start_date,
				 endDate: row.end_date,
	       type: row.is_virtual
			}
  });
});
```

In this solution, you have left a clean looking answer.  You click all of your new tabs and see that only the records you want to show are populating on each tab.  You triumphantly send it to your boss not realizing the issue you’ve unleashed.  Hopefully your boss reads it and sends it back saying “Hey, when I load the full calendar, I’m getting an error. The tabs work, but the full calendar doesn’t anymore.”

Okay, fine you realize you need to handle a case where nothing is filtered.  You go back to work…

```jsx
const buildCalendarRecords = ((data, flag) => {
  let records = data.calendar
  if (flag !== 'all') {
		records = records.filter(row => data.category === flag)
  }

	return records.map(row => {
		return {
			 event: row.title,
			 startDate: row.start_date,
			 endDate: row.end_date,
       type: row.is_virtual
		}
  });
});
```

Fine, it’s not as pretty, but you pass a flag all for the main calendar implementation and send it back to your boss.  Thankfully he checks again and sends it back to you saying “That page is working fine now but the other page that uses `buildCalendarRecords()` are still broken.

It could be easy to blame the boss for not filling you in on the implications of your code, but really the principle we are discussing today would save you from all of the pain.  If they had a better testing policy, this would never have happened.  If it works the same as it did for it’s normal use case, you don’t have to worry about other places it’s being used.  The crazy thing is one minor change fixes it.

```jsx
const buildCalendarRecords = ((data, flag = "all") => {
  let records = data.calendar
  if (flag !== 'all') {
		records = records.filter(row => data.category === flag)
  }

	return records.map(row => {
		return {
			 event: row.title,
			 startDate: row.start_date,
			 endDate: row.end_date,
       type: row.is_virtual
		}
  });
});
```

By adding a default value for your new value and carefully coding, the path works the same as it did before by default.  This might be worthy of another letter later, but there is a point to where it gets too ugly and you need to refactor rather than using the existing functionality.  But learning this technique can save you from looking foolish early on and it’s not something you naturally see when work on solo projects.
