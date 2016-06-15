<?php
/**
 * @since  2016-06-15
 */

include __DIR__.'/../lib/functional.php';

define('N',"\n");
define('M','…………………………………………'."\n");

function zoco_print($input) {
    var_dump($input);
    echo M;
}