<?php

$dd = file_get_contents('../../files/astronaut.jpg');
$str="
";
$img =  "Teste ed deyhehf
frfrijforjfrf
rfrkfrfkorif rf rf r fr fr fr frifrojfo";

$output = str_replace(" ", "", $img);
$output = str_replace($str, "", $output);
echo($output);