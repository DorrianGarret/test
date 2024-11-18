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

/*
 Создать функцию которая определит сколько квадратов меньшего размера
можно вписать в квадрат большего размера размер возвращать в float
*/
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

abstract class ParentClass {
  protected int $property1;
  protected int $property2;

  public function __construct(int $property1, int $property2)
  {
    $this->property1 = $property1;
    $this->property2 = $property2;
  }

  public function getProperty1(): int 
  {
    return $this->property1;
  }

  public function setProperty1(int $property1): void 
  {
    $this->property1 = $property1;
  }

  public function getProperty2() : int 
  {
    return $this->property2;  
  }

  public function setProperty2(int $property2) : void 
  {
    $this->property2 = $property2;
  }

  abstract public function power(): float;
}

final class Child1 extends ParentClass {
  private int $childProperty;

  public function __construct(int $property1, int $property2, int $childProperty)
  {
    parent::__construct($property1, $property2);
    $this->childProperty = $childProperty;
  }

  public function getChildProperty(): int 
  {
  return $this->childProperty;  
  }

  public function setChildPropery(int $childProperty): void
  {
    $this->childProperty = $childProperty;
  }

  public function power(): float
  { 
    return pow($this->property1, $this->property2);
  }
}

class Child2 extends ParentClass {
  private float $childProperty;

  public function __construct(int $property1, int $property2, float $childProperty) {
      parent::__construct($property1, $property2);
      $this->childProperty = $childProperty;
  }

  public function getChildProperty(): float {
      return $this->childProperty;
  }

  public function setChildProperty(float $childProperty): void {
      $this->childProperty = $childProperty;
  }

  public function multiplyProperties(): float {
      return $this->property2 * $this->childProperty;
  }

  public function power(): float {
      return pow($this->property1, $this->property2);
  }
}

class Child3 extends ParentClass {
  private int $childProperty;

  public function __construct(int $property1, int $property2, int $childProperty) {
      parent::__construct($property1, $property2);
      $this->childProperty = $childProperty;
  }

  public function getChildProperty(): int {
      return $this->childProperty;
  }

  public function setChildProperty(int $childProperty): void {
      $this->childProperty = $childProperty;
  }

  public function subtractProperties(): int {
      return $this->property1 - $this->childProperty;
  }

  public function power(): float {
      return pow($this->property1, $this->property2);
  }
}

class GrandChild1 extends Child1 {
  private float $grandChildProperty;

  public function __construct(int $property1, int $property2, int $childProperty, float $grandChildProperty) {
      parent::__construct($property1, $property2, $childProperty);
      $this->grandChildProperty = $grandChildProperty;
  }

  public function getGrandChildProperty(): float {
      return $this->grandChildProperty;
  }

  public function setGrandChildProperty(float $grandChildProperty): void {
      $this->grandChildProperty = $grandChildProperty;
  }

  public function divideProperties(): float {
      return $this->grandChildProperty / $this->getChildProperty();
  }

  public function combineProperties(): float {
      return $this->property1 + $this->grandChildProperty;
  }
}

class GrandChild2 extends Child2 {
  private int $grandChildProperty;

  public function __construct(int $property1, int $property2, float $childProperty, int $grandChildProperty) {
      parent::__construct($property1, $property2, $childProperty);
      $this->grandChildProperty = $grandChildProperty;
  }

  public function getGrandChildProperty(): int {
      return $this->grandChildProperty;
  }

  public function setGrandChildProperty(int $grandChildProperty): void {
      $this->grandChildProperty = $grandChildProperty;
  }

  public function modulusProperties(): int {
      return $this->grandChildProperty % $this->property1;
  }

  public function combineProperties(): float {
      return $this->property2 * $this->grandChildProperty;
  }
}