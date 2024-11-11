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


/*Создать функцию принимающую массив произвольной вложенности и определяющий
  любой элемент номер которого передан параметром во всех вложенных массивах.*/

  function FindElementByIndex($arr, $idx){
    //Проверяем если переданые данные не являються массивом возвращаем null
    if (!is_array($arr)) {
      return null;
    }

    //Если index в текущем массиве есть, возвращаем его данные
    if (array_key_exists($idx, $arr)) {
      return $arr[$idx];
    }
    //Если index в текущем массиве нет, возвращаем Comming Soon
    else{
      return 'Comming Soon';
    }

    //Рекурсивно проходимся по каждому элементу
    foreach($arr as $el){
      if(is_array($arr)){
        $result = FindElementByIndex($el, $idx);

        if($result !== null){
          return $result;
        }
      }
    }
  }

/*
Создать функцию которая считает все буквы b в переданной строке,
в случае если передается не строка функция должна возвращать false
*/

function CountLetterB($input){
  //Проверяем, является ли входное значение строкой
  if(!is_string($input)){
    return false;
  }

  //Приводим строку к нижнему регистру и считаем количество символов 'b'
  return substr_count(strtolower($input), 'b');
}

/*
Создать функцию которая считает сумму значений всех
элементов массива произвольной глубины
*/

function CountArrSum($arr){
  $sum = 0;

  foreach($arr as $val){
    if(is_array($val)){
      //Рекурсия если элемент вложенный массив
      $sum = CountArrSum($val);
    }else{
      //добавить значение если эллемент число
      $sum += $val;
    }
  }
  return $sum;
}


function CountSmallerSquares(float $bigSquareSize, float $smallSquareSize): float {
  // Проверка на корректные значения
  if ($smallSquareSize <= 0 || $bigSquareSize <= 0 || $smallSquareSize > $bigSquareSize) {
      return 0;
  }

  // Количество маленьких квадратов по одной стороне большого квадрата
  $countPerSide = $bigSquareSize / $smallSquareSize;

  // Общее количество маленьких квадратов, которое поместится в большом квадрате
  $totalSquares = $countPerSide * $countPerSide;

  return $totalSquares;
}

