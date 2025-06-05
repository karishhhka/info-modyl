<?php

$conn = mysqli_connect('localhost', 'root', '', 'gruz');

if(!$conn){
    die("Ошибка поключения" . mysqli_connect_error());
}

?>