<?php
$arr = [1, 2, 3, 7, 31, 4, 1, 8, 6];

//посчитать длину массива
count($arr);

//переместить первые 4 элемента массива в конец массива
for($i = 0;$i <= 3;$i++){
	
    $el = array_shift($arr);
	
    array_push($arr,$el);
};

//получить сумму 4,5,6 элемента
$sumArr = $arr[4]+$arr[5]+$arr[6];

$firstArr = [

    'one' => 1,
  
    'two' => 2,
  
    'three' => 3,
  
    'foure' => 5,
  
    'five' => 12,
  
  ];
  
  $secondArr = [
  
    'one' => 1,
  
    'seven' => 22,
  
    'three' => 32,
  
    'foure' => 5,
  
    'five' => 13,
  
    'six' => 37,
  
  ];

//найти все элементы которые отсутствуют в первом массиве и присутствуют во втором
array_diff($secondArr,$firstArr);

//найти все элементы которые присутствую в первом и отсутствуют во втором
array_diff($firstArr,$secondArr);

//найти все элементы значения которых совпадают 
array_intersect($firstArr,$secondArr);

//найти все элементы значения которых отличается

$diffFirst = array_diff_assoc($firstArr, $secondArr);
$diffSecond = array_diff_assoc($secondArr, $firstArr);

$differences = array_merge($diffFirst, $diffSecond);


$firstArray = [
  'one' => 1,
  'two' => [
      'one' => 1,
      'seven' => 22,
      'three' => 32,
  ],
  'three' => [
      'one' => 1,
      'two' => 2,
  ],
  'foure' => 5,
  'five' => [
      'three' => 32,
      'foure' => 5,
      'five' => 12,
  ],
];

//получить все вторые элементы вложенных массивов

$result = [];

foreach ($firstArray as $key => $value) {
  if (is_array($value)) {
      $innerValues = array_values($value);
      if (isset($innerValues[1])) {
          $result[$key] = $innerValues[1];
      }
  }
};

//получить общее количество элементов в массиве

$totalCount = count($firstArray, COUNT_RECURSIVE);


//получить сумму всех значений в массиве

function flattenArray($array) {
  $flatArray = [];
  foreach ($array as $value) {
      if (is_array($value)) {
          $flatArray = array_merge($flatArray, flattenArray($value));
      } else {
          $flatArray[] = $value;
      }
  }
  return $flatArray;
}


$flattenedArray = flattenArray($firstArray);
$totalSum = array_sum($flattenedArray);




