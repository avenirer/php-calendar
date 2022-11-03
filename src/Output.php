<?php
namespace Avenirer\PhpCalendar;

class Output
{
  private $monthData = [];
  private $locale;
  private $firstDayOfWeek = 0;
  private $weekDayFirstDayOfMonth;
  private $totalDaysInMonth;
  private $dayCustomLink = null;
  public function __construct(Calendar $calendar) {
    $this->locale = $calendar->locale;
    $this->firstDayOfWeek = $calendar->firstDayOfWeek;
    $this->weekDayFirstDayOfMonth = $calendar->weekDayFirstDayOfMonth;
    $this->totalDaysInMonth = $calendar->totalDaysInMonth;
    $this->monthData = $calendar->monthData;
    $this->dayCustomLink = $calendar->dayCustomLink;
  }

  public function asMatrix() {
    $weekDays = $this->locale['weekdays'];
    $weekIndexes = array_keys($weekDays);
    if($this->firstDayOfWeek == 1) {
        $firstKey = array_shift($weekIndexes);
        array_push($weekIndexes, $firstKey);
    }

    $output = '<table class="phpcalendar matrix month month-'.$this->monthData['index'].'">';
    $output .= '<thead>';

    $output .= '<tr>';
    $output .= '<th colspan="7" scope="colgroup" class="month-name">'.$this->monthData['long'].'</th>';
    $output .= '</tr>';

    // week days
    $output .= '<tr class="weekdays">';
    foreach($weekIndexes as $index) {
        $output .= '<th scope="col" class="weekday-'.strtolower($weekDays[$index]['index']).'">' . $weekDays[$index]['short'] . '</th>';
    }
    $output .= '</tr>';
    $output .= '</thead>';

    $output .= '<tbody>';

    $firstDaySet = false;
    $finishedSettingDays = false;
    $day = 1;
    $week = 1;
    $i = 0;
    while($i<=6) {
        if($i == 0) {
            $output .= '<tr class="week weeek-'.$week.'" data-week="'.$week.'">';
        }

        $output .= '<td';
        if((!$firstDaySet && $this->weekDayFirstDayOfMonth != $weekIndexes[$i]) || $finishedSettingDays) {
            $output .= '>&nbsp;';
        }
        else {
            $output .= ' class="day weekday-'.$weekDays[$weekIndexes[$i]]['index'].'" data-day="'.$day.'" data-month="'.$this->monthData['index'].'" data-year="'.$this->monthData['year'].'">';
            if($this->dayCustomLink) {
                $link = str_replace(['{year}', '{month}', '{day}'],[$this->monthData['year'], sprintf('%02d',$this->monthData['index']), sprintf('%02d', $day)], $this->dayCustomLink);
                $output .= '<a href="' . $link . '">';
            }
            $output .= '<span class="' . ($this->monthData['days'][$day]['events'] ? 'event' : '') . '">'.$day.'</span>';
            if($this->dayCustomLink) {
                $output .= '</a>';
            }
            $firstDaySet = true;
        }
        $output .= '</td>';
        
        if($i == 6) {
            $output .= '</tr>';
            $week += 1;
        }

        if($day==$this->totalDaysInMonth) {
            $finishedSettingDays = true;
        }

        $i = $i == 6 ? ( $finishedSettingDays ? 7 : 0 ) : $i+1;
        if($firstDaySet) {
            $day += 1;
        }
    }


    $output .= '</tbody>';
    $output .= '</table>';

    return $output;
}

public function asList() {
    $output = '<ul class="phpcalendar list month month-'.$this->monthData['index'].'">';

    foreach($this->monthData['days'] as $day) {
        $output .= '<li class="day weekday-'.$day['index'].'" data-day="'.$day['monthDay'].'" data-month="'.$this->monthData['index'].'" data-year="'.$this->monthData['year'].'">';
        $output .= '<span class="date">' . $day['short'] . '<br />' . $day['monthDay'] . '</span>';
        $output .= '</li>';
    }

    $output .= '</ul>';
    return $output;
}




}
