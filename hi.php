<?php

$name = $_GET['name'];

if (isset($name)){
    echo "The Name is ".$name."<br>";
    echo "Hi ".$name;
}
else{
    echo "I Need your name :(";
}



