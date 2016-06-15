<?php
/**
 * @since  2016-06-15
 */

include __DIR__.'/bootstrap.php';

$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

// [4,2,1]
$result = __($numbers)->chain()
                      ->select(function($n) { return $n < 5; })
                      ->reject(function($n) { return $n === 3; })
                      ->sortBy(function($n) { return -$n; })
                      ->value();
zoco_print($result);

// [4,2,1]
$result = __::chain($numbers)->select(function($n) { return $n < 5; })
                             ->reject(function($n) { return $n === 3; })
                             ->sortBy(function($n) { return -$n; })
                             ->value();
zoco_print($result);

// [1,2,3]
$result = __(array(1, 2, 3))->value();
zoco_print($result);

$lyrics = array(
    "I'm a lumberjack and I'm okay",
    "I sleep all night and I work all day",
    "He's a lumberjack and he's okay",
    "He sleeps all night and he works all day"
);
$result = __($lyrics)->chain()
                     ->map(function($line) { return str_split($line); })
                     ->flatten()
                     ->reduce(function($hash, $l) {
                         if(!is_array($hash)) {
                             $hash = array();
                         }
                         $hash[$l] = array_key_exists($l, $hash) ? $hash[$l] : 0;
                         $hash[$l]++;
                         return $hash;
                     })
                     ->value();
zoco_print($result);