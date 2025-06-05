<?php
session_start();
include 'db.php';
if(!isset($_SESSION['id_user'])){
      header('Location: reg.php');
}
$id_user = $_SESSION['id_user'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <header>
        <h1>Грузовозофф</h1>
    </header>
     <table border="1" cellpadding="10">
       <tr>
            <th>id_bron</th>
            <th>date</th>
            <th>time</th>
            <th>vez</th>
            <th>gabariti</th>
            <th>address_ot</th>
            <th>address_dost</th>
           <th>type</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `bron` WHERE id_user = $id_user ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)):
        ?>
         <tr>
            <td><?= htmlspecialchars($row['id_bron'])?></td>
            <td><?= htmlspecialchars($row['date'])?></td>
            <td><?= htmlspecialchars($row['time'])?></t>
            <td><?= htmlspecialchars($row['vez'])?></td>
            <td><?= htmlspecialchars($row['gabariti'])?></td>
            <td><?= htmlspecialchars($row['address_ot'])?></td>
           <td><?= htmlspecialchars($row['address_dost'])?></td>
            <td><?= htmlspecialchars($row['type'])?></t>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html>