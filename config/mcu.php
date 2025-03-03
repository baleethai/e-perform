<?php

$list = [];
$start = 1990;
$end = 2030;
for ($i = $start; $i <= $end; $i++) {
    $list[$i] = $i + 543;
}

return [
    'years' => $list
];
