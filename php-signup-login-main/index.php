<?php
session_start();
if (isset($_SESSION["user_id"])){
    require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user WHERE id ={$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
//check user id in sesion id
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Home</h1>
    <?php if (isset($user)): ?>
        <p>Hello, <?= htmlspecialchars($user["real_name"])." " .($user["email"]) ?></p>
        <p><a href="logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="login.php">Log in</a> or <a href="signup.php">Sign up</a></p>
            <?php endif; ?>

</body>
