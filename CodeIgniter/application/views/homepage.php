<?php
echo $int."</br>";
echo $string;
echo <<<HTML
        <h1>Hello from homepage.php</h1>
        <h2>$int : this integer came all the way from controller to view</h2>
        <h2>$string : this string came all the way from controller to view</h2>
    HTML;
var_dump($array);
?>