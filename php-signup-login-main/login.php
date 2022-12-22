<?php
 require __DIR__ . "/database.php";
$is_invalid = false;
$user = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" )

{ 
    if($sql = sprintf( //check if email and login match with record in db
    "SELECT * FROM user WHERE email like '%s'",//placeholder email should have index
    $mysqli->real_escape_string($_POST["email"])) ){
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();//assoc array
    }
    else {
        $sql1 = sprintf( //check if email and login match with record in db
            "SELECT * FROM user WHERE login like '%s'",//placeholder email should have index
            $mysqli->real_escape_string($_POST["login"]));//defence again sql injection//defence again sql injection
            $result1 = $mysqli->query($sql1);
            $user = $result1->fetch_assoc();
    }

}
    
    
    if ($user) {
    if (password_verify($_POST["password"], $user["password"] ))  {
            session_start();
            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit();
    }
 }
    $is_invalid = true;
    


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
    <?php if($is_invalid):
     ?>
     <em>Invalid login</em>
     <?php endif; ?>
    <form method = "post">
        <label for ="email">Email</label>
        <input type = "email" name ="email" id ="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <b>Or</b><br><br>
        <label for ="login">Login</label>
        <input type = "text" name ="login" id ="login">
        <label for="password">Password</label>
        <input type = "password" name = "password" id = "password">
        <button>Login</button>
    </form>

    
</body>
</html>