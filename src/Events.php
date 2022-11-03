<?php
namespace Avenirer\PhpCalendar;

class Events
{
  use HelperTrait;
  private $events = [];

  public function add($event) {

    if(!$this->arrayIsAssoc($event)) {
      foreach($event as $ev) {
        $this->add($ev);
      }
    }


    $addEvent = [];
    if(!array_key_exists('startDate', $event) || !array_key_exists('title', $event) || !$this->validateDateFormat($event['startDate'])) {
      return $this;
    }
    $addEvent['startDate'] = $event['startDate'];

    $addEvent['endDate'] = null;
    if(array_key_exists('endDate', $event) && validateDateFormat($event['endDate'])) {
      $addEvent['endDate'] = $event['endDate'];
    }
    
    $addEvent['startTime'] = $event['startTime'] ?? null;
    $addEvent['endTime'] = $event['endTime'] ?? null;
    $addEvent['title'] = $event['title'];
    $addEvent['shortContent'] = $event['shortContent'] ?? null;
    $addEvent['content'] = $event['content'] ?? null;
    $addEvent['link'] = $event['link'] ?? null;

    if(!array_key_exists('startDate', $event)) {
      $this->events[$addEvent['startDate']] = [];
    }
    $this->events[$addEvent['startDate']][] = $addEvent;

    return $this;
  }

  public function getAll()
  {
    asort($this->events);
    return $this->events;
  }

  public function getDate($date)
  {
    if(validateDateFormat($date) && array_key_exists($date, $this->events)) {
      usort($this->events[$date], function ($item1, $item2) {
        return $item1['startTime'] <=> $item2['startTime'];
      });
      return $this->events;
    }
    return null;
  }
}