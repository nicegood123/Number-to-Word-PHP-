<?php

$error_message = "Invalid value. Please input a number between 0 and 999999.";

function value() {
  global $error_message;
  return $value = (!empty($_POST['value'] && is_numeric($_POST['value'])) ? (int)$_POST['value'] : $error_message);
}

function getValue() {
  global $error_message;
  
  if (value() >= 0 && value() <= 999999) {
    echo value();
  } else {
    echo $error_message;
  }
}

function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

$type = (!empty($_POST['type'])) ? $_POST['type'] : $error_message;

function label() {
  global $type;
  return ($type == "odd-even") ? "Even/Odd: " : "In Words: ";
}

function selectedProcess() {
  global $error_message;
  global $type;
  if(!empty(value())) {
    $even_odd = ((int)value() % 2 == 0) ? "Even Number" : "Odd Number";
    $in_words = convertNumberToWord(value());

    return ($type == "odd-even") ? $even_odd : $in_words;
  } else {
    return $error_message;
  }
}

$status = 'hidden';

if(isset($_POST['submit'])) {
  $status = '';
}








?>