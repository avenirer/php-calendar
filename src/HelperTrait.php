<?php
namespace Avenirer\PhpCalendar;

trait HelperTrait
{
  function validateDateFormat($string)
  {
    $stringArr = explode('-', $string);
    if(count($stringArr) !== 3 || !checkdate($stringArr[1], $stringArr[2], $stringArr[0])) {
      return false;
    }
    return true;
  }

  function arrayIsAssoc(array $array) {
    return count(array_filter(array_keys($array), 'is_string')) > 0;
  }
}