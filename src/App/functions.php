<?php 

declare(strict_types=1);

/*
*
*This function is used to output the $value prettier
*It is really useful for debugging
*/
function dd(mixed $value){
    echo '<pre>';
print_r($value);
echo '</pre>';
die();
}

function e(mixed $value):string{
    return htmlspecialchars((string)$value);
}