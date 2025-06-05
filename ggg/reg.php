<?php
session_start();
include 'db.php';
function validate_input($data){
    $data = trim($data);
     $data = htmlspecialchars($data);
     return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = validate_input($_POST['login']);
    $fio = validate_input($_POST['fio']);
    $tel = validate_input($_POST['tel']);
    $email = validate_input($_POST['email']);
    $password = validate_input($_POST['password']);


    $check_login_sql = "SELECT * FROM `user` WHERE login = '$login'";
    $login_result = mysqli_query($conn, $check_login_sql);

    if (mysqli_num_rows($login_result) > 0) {
        echo "Этот логин уже занят.";
        exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user` (`login`, `fio`, `phone`, `email`, `password`) VALUES ('$login', '$fio', '$tel', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        header('Location: login.php');

    }else{
        echo"Ошибка регистрации";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Грузовозофф</h1>
    </header>
<form method="post">
        <input type="text" required name="login" minlength="6" placeholder="Логин (не менее 6 символов)">
        <input type="text" required name="fio" placeholder="ФИО">
        <input type="text" required name="phone" minlength="11" placeholder="+7(XXX)-XXX-XX-XX">
        <input type="email" required name="email" placeholder="Email">
        <input type="password" required name="password" minlength="6" placeholder="Пароль">
        <button type="submit">Регистрация</button>
    </form>
    <a href="login.php">Войти</a>
    <footer>
        <p>Проект разработан Гридневой Кариной Константиновной</p>
    </footer>
</body>
</html>