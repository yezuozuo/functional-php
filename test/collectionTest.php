<?php
/**
 * @since  2016-06-15
 */
include __DIR__.'/bootstrap.php';

// 1,0,2,1,3,2
$test =& $this;
__::each(array(1,2,3), function($num, $i) use ($test) {
    zoco_print($num);
    zoco_print($i);
});

// [5,10,15]
$answers = array();
$context = (object) array('multiplier'=>5);
__::each(array(1,2,3), function($num) use (&$answers, $context) {
    $answers[] = $num * $context->multiplier;
});
zoco_print($answers);

// ['one','two','three']
$answers = array();
$obj = (object) array('one'=>1, 'two'=>2, 'three'=>3);
__::each($obj, function($value, $key) use (&$answers) {
    $answers[] = $key;
});
zoco_print($answers);

// true
$answer = null;
__::each(array(1,2,3), function($num, $index, $arr) use (&$answer) {
    if(__::includ($arr, $num)) {
        $answer = true;
    }
});
zoco_print($answers);

// 0
$answers = 0;
__::each(null, function() use (&$answers) {
    $answers++;
});
zoco_print($answers);

// '1,2,3'
$str = '';
__::each(array(1, 2, 3), function($num) use (&$str) { $str .= $num . ','; });
zoco_print($str);

// '0=2,1=4,2=6,'
$str = '';
$multiplier = 2;
__::each(array(1, 2, 3), function($num, $index) use ($multiplier, &$str) {
    $str .= $index . '=' . ($num * $multiplier) . ',';
});
zoco_print($str);

// [3,6,9]
$multiplier = 3;
$func = function($num) use ($multiplier) { return $num * $multiplier; };
$tripled = __::map(array(1,2,3), $func);
zoco_print($tripled);

// [2,4,6]
$doubled = __::collect(array(1, 2, 3), function($num) { return $num * 2; });
zoco_print($doubled);

// [3,6,9]
$result = __::map(array('one'=>1, 'two'=>2, 'three'=>3), function($num, $key) { return $num * 3; });
zoco_print($result);

// 2
$result = __::find(array(1,2,3), function($num) { return $num * 2 === 4; });
zoco_print($result);

// 2
$iterator = function($n) { return $n % 2 === 0; };
$result = __::find(array(1, 2, 3, 4, 5, 6), $iterator);
zoco_print($result);

// false
$result = __::find(array(1, 3, 5), $iterator);
zoco_print($result);

