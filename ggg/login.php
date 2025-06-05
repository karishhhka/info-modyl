
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
    $password = validate_input($_POST['password']);

if ($login == 'admin' || $password == 'gruzovik2024') {
        header('Location: admin.php');
        $_SESSION['admin'] = true;
        exit;
    }
    $sql = "SELECT * FROM `user` WHERE `login` = '$login'";

$result = mysqli_query($conn, $sql); 
if($row = mysqli_fetch_assoc($result))   {
    if(password_verify($password, $row['password'])){
         $_SESSION['id_user'] = $row['id_user'];
            header("Location: add_card.php");
    }
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
        <input type="password" required name="password" minlength="6" placeholder="Пароль">
        <button type="submit">Авторизация</button>
    </form>
    <a href="reg.php">Зарегестрируйся</a>
    <footer>
        <p>Проект разработан Гридневой Кариной Константиновной</p>
    </footer>
</body>
</html>