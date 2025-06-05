<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: reg.php');
    exit;
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); 
    $sql = "DELETE FROM bron WHERE id_bron = $id";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка — Грузовозофф</title>
</head>
<body>
    <header>
        <h1>Грузовозофф — Админка</h1>
    </header>

    <table border="1" cellpadding="10">
        <tr>
            <th>id_bron</th>
            <th>Дата</th>
            <th>Время</th>
            <th>Вес</th>
            <th>Габариты</th>
            <th>Откуда</th>
            <th>Куда</th>
            <th>Тип</th>
            <th>Действия</th>
        </tr>
        <?php
        $sql = "SELECT * FROM bron ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['id_bron']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['time']) ?></td>
            <td><?= htmlspecialchars($row['vez']) ?></td>
            <td><?= htmlspecialchars($row['gabariti']) ?></td>
            <td><?= htmlspecialchars($row['address_ot']) ?></td>
            <td><?= htmlspecialchars($row['address_dost']) ?></td>
            <td><?= htmlspecialchars($row['type']) ?></td>
            <td><a href="?delete=<?= intval($row['id_bron']) ?>">Удалить</a></td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
            <td colspan="9">Нет записей</td>
        </tr>
        <?php endif; ?>
    </table>
</body>
</html>