<?php
/**
 * @since  2016-06-15
 */

include __DIR__.'/bootstrap.php';

// 1
$result = __::first(array(1,2,3));
zoco_print($result);

// []
$result = __::first(array(1,2,3), 0);
zoco_print($result);

// [1,2]
$result = __::first(array(1,2,3), 2);
zoco_print($result);

// [1,1]
$result = __::map(array(array(1,2,3), array(1,2,3)), function($vals) {
    return __::first($vals);
});
zoco_print($result);

// 4
$func = function() { return __::first(func_get_args()); };
$result = $func(4,3,2,1);
zoco_print($result);

// [4,5]
$result = __(array(4,5,6,7))->first(2);
zoco_print($result);

// [2,3,4]
$numbers = array(1,2,3,4);
$result = __::rest($numbers);
zoco_print($result);

// [1,2,3,4]
$result = __::rest($numbers,0);
zoco_print($result);

// [3,4]
$result = __::rest($numbers, 2);
zoco_print($result);

// [2,3,4]
$func = function() { return __(func_get_args())->tail(); };
$result = $func(1,2,3,4);
zoco_print($result);

// string(2,3,2,3)
$result = __::map(array(array(1,2,3), array(1,2,3)), function($vals) { return __::rest($vals); });
$result = join(',', __::flatten($result));
zoco_print($result);

// string(1,2,3,4)
$result = join(',', __::initial(array(1,2,3,4,5)));
zoco_print($result);

// string(1,2)
$result = join(',', __::initial(array(1,2,3,4), 2));
zoco_print($result);

// string(1,2,3)
$func = function() {
    return __(func_get_args())->initial();
};
$result = $func(1,2,3,4);
$result = join(',', $result);
zoco_print($result);

// string(1,2,1,2)
$result = __::map(array(array(1,2,3), array(1,2,3)), function($item) { return __::initial($item); });
$result = join(',', __::flatten($result));
zoco_print($result);

// 3
$result = __::last(array(1,2,3));
zoco_print($result);

// 4
$func = function() { return __(func_get_args())->last(); };
$result = $func(1,2,3,4);
zoco_print($result);

// ''
$result = join(',', __::last(array(1,2,3), 0));
zoco_print($result);

// string(2,3)
$result = join(',', __::last(array(1,2,3), 2));
zoco_print($result);

// string(1,2,3)
$result = join(',', __::last(array(1,2,3), 5));
zoco_print($result);

// [3,3]
$result = __::map(array(array(1,2,3), array(1,2,3)), function($item) { return __::last($item); });
zoco_print($result);

// [1,2,3]
$val = array(0, 1, false, 2, false, 3);
$result = __::compact($val);
zoco_print($result);

// 3
$func = function() { return count(__(func_get_args())->compact()); };
$result = $func(0, 1, false, 2, false, 3);
zoco_print($result);

// [true,'a',1]
$result = __::compact(array(false, true, 'a', 0, 1, ''));
zoco_print($result);

// [1,2,3,4]
$list = array(1, array(2), array(3, array(array(array(4)))));
$result = __::flatten($list);
zoco_print($result);

// [1,2,3,4]
$func = function() { return __::flatten(func_get_args()); };
$result = $func(1, array(2), array(3, array(array(array(4)))));
zoco_print($result);

// [2,3,4]
$list = array(1, 2, 1, 0, 3, 1, 4);
$result = __::without($list, 0, 1);
zoco_print($result);

// [(object)['one' => 1],(object)['two' => 2]]
$list = array(
    (object) array('one'=>1),
    (object) array('two'=>2)
);
$result = __::without($list, (object) array('one'=>1));
zoco_print($result);

// [(object)['two' => 2]]
$result = __::without($list, $list[0]);
zoco_print($result);

// [2,3,4]
$func = function() { return __::without(func_get_args(), 0, 1); };
$result = $func(1, 2, 1, 0, 3, 1, 4);
zoco_print($result);

// [1,2,3,30,40]
$result = __::union(array(1, 2, 3), array(2, 30, 1), array(1, 40, array(1)));
zoco_print($result);

// [1,2,3,9]
$list = array(1, 2, 1, 3, 1, 9);
$result = __::uniq($list);
zoco_print($result);

// [1,2,3]
$list = array(1, 1, 1, 2, 2, 3);
$result = __::uniq($list);
zoco_print($result);

// [1,2,3,4]
$func = function() { return __::uniq(func_get_args()); };
$result = $func(1,2,1,3,1,4);
zoco_print($result);

$list = array(
    (object) array('name'=>'moe'),
    (object) array('name'=>'curly'),
    (object) array('name'=>'larry'),
    (object) array('name'=>'curly')
);
// ['moe','curly','larry']
$iterator = function($value) { return $value->name; };
$result = __::map(__::uniq($list, $iterator), $iterator);
zoco_print($result);

// [1,2,3,4]
$iterator = function($value) { return $value + 1; };
$list = array(1, 2, 2, 3, 4, 4);
$result = __::uniq($list, $iterator);
zoco_print($result);

// ['moe']
$stooges = array('moe', 'curly', 'larry');
$leaders = array('moe', 'groucho');
$result = __::intersection($stooges, $leaders);
zoco_print($result);

// ['moe']
$result = __($stooges)->intersection($leaders);
zoco_print($result);

// [2,3]
$arr1 = array(0, 1, 2, 3);
$arr2 = array(1, 2, 3, 4);
$arr3 = array(2, 3, 4, 5);
$result = __::intersection($arr1, $arr2, $arr3);
zoco_print($result);

// [1,2,3,30,40]
$result = __::union(array(1, 2, 3), array(2, 30, 1), array(1, 40));
zoco_print($result);

// [1,3]
$result = __::difference(array(1, 2, 3), array(2, 30, 40));
zoco_print($result);

// [3,4]
$result = __::difference(array(1, 2, 3, 4), array(2, 30, 40), array(1, 11, 111));
zoco_print($result);

$names  = array('moe', 'larry', 'curly');
$ages   = array(30, 40, 50);
$leaders= array(true);
// array(array('moe', 30, true), array('larry', 40, null), array('curly', 50, null));
$result = __::zip($names, $ages, $leaders);
zoco_print($result);

// 1
$numbers = array(1,2,3);
$result = __::indexOf($numbers, 2);
zoco_print($result);

// -1
$result = __::indexOf(null, 2);
zoco_print($result);

// 1
$func = function() { return __::indexOf(func_get_args(), 2); };
$result = $func(1,2,3);
zoco_print($result);

// 'b'
$result = __(array('a'=>5,'b'=>10,'c'=>15))->indexOf(10);
zoco_print($result);

// 1
$result = __::indexOf('foobar', 'o');
zoco_print($result);

// 5
$numbers = array(1, 0, 1, 0, 0, 1, 0, 0, 0);
$result = __::lastIndexOf($numbers, 1);
zoco_print($result);

// 8
$result = __::lastIndexOf($numbers, 0);
zoco_print($result);

// []
$result = __::range(0);
zoco_print($result);

// [0,1,2,3]
$result = __::range(4);
zoco_print($result);

// [5,6,7]
$result = __::range(5,8);
zoco_print($result);

// []
$result = __::range(8,5);
zoco_print($result);

// [3,6,9]
$result = __::range(3, 10, 3);
zoco_print($result);

// [3]
$result = __::range(3, 10, 15);
zoco_print($result);

// [12,10,8]
$result = __::range(12, 7, -2);
zoco_print($result);

// [0,-1,-2,-3,-4,-5,-6,-7,-8,-9]
$result = __::range(0, -10, -1);
zoco_print($result);

// [10,11,12]
$result = __(10)->range(13);
zoco_print($result);

// [3,6,9]
$result = __(3)->range(10, 3);
zoco_print($result);