<?php
require_once('../vendor/autoload.php');

use Avenirer\PhpCalendar\Calendar;
use Avenirer\PhpCalendar\Events;

$events = new Events;

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

$calendar = new Calendar;

$returned = $calendar->setLocale('ro')->addEvents($events)->weekStartsMonday()->showMonthName()->padWithZeros()->addDayCustomLink('/test/{year}/{month}/{day}')->getMonth('2022-11-01');
$returnedAsMatrix = $returned->asMatrix();
$returnedAsList = $returned->asList();
//$returned = $calendar->setLocale('ro')->weekStartsMonday()->getMonth('3025-09-01')->asList();

?>
<html>
  <head>
    <style>
.phpcalendar, .phpcalendar * {
  box-sizing: border-box;
  font-family: sans-serif;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 0;
}

.phpcalendar.matrix.month, .phpcalendar.list.month {
  background: #2b4450;
  border-radius: 4px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, .3);
  perspective: 1000;
  transition: .9s;
  transform-style: preserve-3d;
  width: 100%;
  color: #dfebed;
}

/* Front - Calendar */
/* .front {
  transform: rotateY(0deg);
} 

.current-date {
  border-bottom: 1px solid rgba(73, 114, 133, .6);
  display: flex;
  justify-content: space-between;
  padding: 30px 40px;
}

.current-date h1 {
  font-size: 1.4em;
  font-weight: 300;
}*/

.phpcalendar.matrix th, .phpcalendar.list .month-name, .phpcalendar.list li {
  color: #dfebed;
  font-weight: 600;
  padding: 10px 20px;
}

.phpcalendar.matrix th.month-name, .phpcalendar.list .month-name {
  font-size: 1.5em;
  font-variant: small-caps;
  font-weight: 400;
}

.phpcalendar.matrix tbody td {
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
}

.phpcalendar.matrix tbody td a, .phpcalendar.matrix tbody td a:hover, .phpcalendar.matrix tbody td a:visited {
  color: #fff;
  text-decoration: none;
}

.phpcalendar.matrix tbody td:hover {
  color: #fff;
  font-weight:600;
  padding: 10px 20px;
}

.phpcalendar.matrix .day {
  text-align:center;
}

.phpcalendar.matrix .event {
  position: relative;
}

.phpcalendar.matrix .event:after {
  content: '•';
  color: #f78536;
  font-size: 1.4em;
  position: absolute;
  right: -10px;
  top: -10px;
}


    </style>
  </head>
  <body>
    <div style="width:200px; margin-bottom: 20px;">
      <?php echo $returnedAsMatrix; ?>
    </div>
    <div>
      <?php echo $returnedAsList; ?>
    </div>
  </body>
</html>