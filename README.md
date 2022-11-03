# php-calendar

## Usage example

Initiate class:

```php
$calendar = new Calendar;
```
Then simply chain the settings:

```php
$returned = $calendar->setLocale('ro')->addEvents($events)->weekStartsMonday()->addDayCustomLink('/test/{year}/{month}/{day}')->getMonth('2022-11-01')->asMatrix();
```
The bare minimum to setup the calendar is:

```php
$returned = $calendar->getMonth('2022-11-01')->asMatrix();
```
If you want to have further settings, you can use the chaining of methods before using the `getMonth()` method.

## Let's explain...

### Set the language
We can set the language of the  using the `setLocale()` method. If we want to use English, we can forget about this method. Otherwise, you can choose from 'fr' (French) and 'ro' (Romanian).

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

#### Array
If you just want an array with the month, you can pass this as a second parameter of `getMonth()` method `...->getMonth('2022-11-01', 'array')`. Also, you can use another method after the `getMonth()`, `asArray()`.

//$returned = $calendar->setLocale('ro')->weekStartsMonday()->getMonth('3025-09-01')->asList();