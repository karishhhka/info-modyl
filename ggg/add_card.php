<?php
session_start();
include 'db.php';
if(!isset($_SESSION['id_user'])){
      header('Location: reg.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = $_POST['date'];
      $time = $_POST['time'];
     $vez = $_POST['vez'];
    $gabariti = $_POST['gabariti'];
    $address_ot = $_POST['address_ot'];
    $address_dost = $_POST['address_dost'];
    $type = $_POST['type'];

    $sql = "INSERT INTO `bron` ( `id_user`,`date`, `time`,`vez`, `gabariti`, `address_ot`, `address_dost`, `type`)
     VALUES ( ".$_SESSION['id_user'].", '$date', '$time','$vez', '$gabariti', '$address_ot', '$$address_dost', '$type')";

    if(mysqli_query($conn, $sql)){
        header('Location: my_bron.php');
    }else{
        echo "Ошибка бронирования";
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
        <input type="date" required name="date">
          <input type="time" required name="time">
          <input type="number" required name="vez">
        <input type="number" required name="gabariti">
         <input type="text" required name="address_ot" >
         <input type="text" required name="address_dost" >
               <select name="type" required>
            <option value="">-- Выберите тип груза --</option>
            <option value="хрупкое">Хрупкое</option>
            <option value="скоропортящееся">Скоропортящееся</option>
            <option value="требуется рефрижератор">Требуется рефрижератор</option>
            <option value="животные">Животные</option>
            <option value="жидкость">Жидкость</option>
            <option value="мебель">Мебель</option>
            <option value="мусор">Мусор</option>
        </select>
         <button type="submit">Регайся</button>
    </form>
    <a href="my_card.php">Мои карточки</a>
</body>
</html> 