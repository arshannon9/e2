<?php

require 'Number.php';
require 'EvenNumber.php'; 
require 'Debug.php';

use HES\Number;
use HES\EvenNumber;
use HES\Debug;

$a = new Number(10);
var_dump($a->getHalf()); # int(5)
var_dump($a->isValid()); # bool(true)

$b = new EvenNumber(11);
var_dump($b->getHalf()); # float(5.5)
var_dump($b->isValid()); # bool(false)

$exampleData = ['Lorem', 'ipsum', 'dolor', 'sit', 'amet'];

Debug::dump($exampleData);
// Debug::log($exampleData);