# php-calendar

## Usage example

Initiate class:

```php
$calendar = new Calendar;
```
Then simply chain the settings:

```php
$returned = $calendar
  ->setLocale('ro')
  ->addEvents($events)
  ->weekStartsMonday()
  ->padWithZeros()
  ->showMonthName()
  ->addDayCustomLink('/test/{year}/{month}/{day}')
  ->getMonth('2022-11-01')
  ->asMatrix();
```
The bare minimum to setup the calendar is:

```php
$returned = $calendar->getMonth('2022-11-01')->asMatrix();
```
If you want to have further settings, you can use the chaining of methods before using the `getMonth()` method.

## Let's explain...

### Set the language
We can set the language of the  using the `setLocale()` method. If we want to use English, we can forget about this method. Otherwise, you can choose from 'fr' (French) and 'ro' (Romanian).

### Add events to calendar
You can add events to the calendar if you consider it useful. In order to add events, you should create an Events object:

```php
$events = new Events;

$events->add(
  [
    'startDate' => '2022-11-22',
    'startTime' => '13:10',
    'title' => 'Event title',
  ],
);
```

By using the add() method to which you pass an array with the event details, you can add the event details. The required fields for the event are the `startDate` and the `title`. The array can also receive other parameters, if you think you need them:

```php
[
  'startDate' => '2022-11-22', // start date of the event
  'startTime' => '13:10', // start time of the event
  'endDate' => '2022-12-01', // end date of the event
  'endTime' => '14:00', // end time of the event
  'title' => 'Event title', // the event title
  'shortContent' => 'The teaser of the content', // a short description of the event
  'content' => 'Full description of the event', // a longer description of the event
  'link' => 'https://link.to/wherever' // link to the event page
]
```

By the way, you can add multiple events on the same method:

```php
$events->add(
  [
    [
      'startDate' => '2022-11-22',
      'startTime' => '13:10',
      'title' => 'Event title',
    ],
    [
      'startDate' => '2022-12-22',
      'startTime' => '13:40',
      'title' => 'One Event title',
    ],
  ]
);
```

### Does the week start on Monday?
If you want to set the week to start on Monday, as in "not the American style", you can use the method `weekStartsMonday()`.

### Set a link to be used when someone clicks on the day
If you want to further use the calendar and make it interactive by allowing users to click on the days and be taken to specific url, you can use the `addDayCustomLink()` using the `{year}`, `{month}` and `{day}` as placeholder for the values.

### What month are we talking about
In order to retrieve the month, we use the `getMonth()` method, mentioning the year and month using a `Y-m-d` format. Don't worry about the day; the whole month will be created.

### What do we want to be returned

#### Matrix
If you want to see the month as a matrix (HTML table), you can pass this as a second parameter of `getMonth()` method `...->getMonth('2022-11-01', 'matrix')`. Also, you can use another method after the `getMonth()`, `asMatrix()`.

#### List
If you want to see the month as a list (HTML UL list), you can pass this as a second parameter of `getMonth()` method `...->getMonth('2022-11-01', 'list')`. Also, you can use another method after the `getMonth()`, `asList()`.

#### Show the month name?
For the methods that output in HTML the month we can request that the month name be shown using the `showMonthName()` method.

#### Show leading zeros?
For the one number month days (1 to 9) you can decide to prepend the day number with a leading zero. You can do this by adding the method `padWithZeros()`.

#### Array
If you just want an array with the month, you can pass this as a second parameter of `getMonth()` method `...->getMonth('2022-11-01', 'array')`. Also, you can use another method after the `getMonth()`, `asArray()`.