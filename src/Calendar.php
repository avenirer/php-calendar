<?php
namespace Avenirer\PhpCalendar;

use DateTime;
use Exception;
use IntlDateFormatter;

class Calendar {
    use HelperTrait;
    public $locale, $weekDayFirstDayOfMonth, $totalDaysInMonth, $monthData, $events;
    public $dayCustomLink = null;
    public $firstDayOfWeek = 0;

    function __construct() {
        $this->locale = Languages::getLocale('en');
    }

    public function getMonth($date = null, $as = null) 
    {
        $date = $date ?? date('Y-m-d');
        $date = DateTime::createFromFormat('Y-m-d', $date);
        $date->modify('first day of this month');
        
        $this->weekDayFirstDayOfMonth = (int) $date->format('w');
        $this->totalDaysInMonth = (int) $date->format('t');

        $this->monthData = $this->locale['months'][$date->format('n')];
        $this->monthData['year'] = $date->format('o');
        $this->monthData['totalDays'] = $this->totalDaysInMonth;
        $this->monthData['weekDayFirstDayOfMonth'] = $this->weekDayFirstDayOfMonth;

        if($this->events) {
            $this->events = array_filter($this->events, function($key) {
                return strpos($key, $this->monthData['year'] . '-' . $this->monthData['index']) !== false;
            }, ARRAY_FILTER_USE_KEY);
        }

        $days = [];
        $weekDay = $this->weekDayFirstDayOfMonth;

        for($i = 1; $i <= $this->totalDaysInMonth; $i++) {
            $events = $this->events[$this->monthData['year'] . '-' . $this->monthData['index'] . '-' . sprintf("%02d", $i)] ?? [];
            $days[$i] = array_merge(['monthDay' => $i, 'events' => $events], $this->locale['weekdays'][$weekDay]);
            $weekDay = ($weekDay == 6) ? 0 : $weekDay+=1;
        }

        $this->monthData['days'] = $days;

        if(!isset($as)) {
            return $this;
        }

        

        $methodName = 'as' . ucfirst(strtolower($as));
        $output = new Output($this);
        return $output->{$methodName}();
    }


    /**
     * Set locale of the output.
     *
     * @param string $locale
     * @return void
     */
    public function setLocale($locale)
    {
        $this->locale = Languages::getLocale($locale);
        return $this;
    }

    public function weekStartsMonday() {
        $this->firstDayOfWeek = 1;
        return $this;
    }

    public function weekStartsSunday() {
        $this->firstDayOfWeek = 0;
        return $this;
    }

    public function asMatrix() {
        $output = new Output($this);
        return $output->asMatrix();
    }

    public function asList() {
        $output = new Output($this);
        return $output->asList();
    }

    public function asArray() {
        return $this->monthData;
    }

    public function addEvents(Events $events) {
        $this->events = $events->getAll();
        return $this;
    }

    public function addDayCustomLink($str) {
        $this->dayCustomLink = $str;
        return $this;
    }
}

