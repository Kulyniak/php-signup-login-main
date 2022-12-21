<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    require __DIR__ . "/database.php";
    $sql = sprintf(
        "SELECT * FROM user WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));
   $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    var_dump($user);
     if ($user){
        if(password_verify($_POST["password"], $user["password_hash"])){
        die("Login success");
       }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    <form method = "post">
        <label for ="email">Email</label>
        <input type = "email" name ="email" id ="email">
        <b>Or</b><br><br>
        <label for ="login">Login</label>
        <input type = "text" name ="login" id ="login">
        <label for="password">Password</label>
        <input type = "password" name = "password" id = "password">
        <button>Login</button>
    </form>

    
</body>
</html>