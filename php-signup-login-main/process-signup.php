 
 <?php
  
 if (empty($_POST["email"])) {
    die("Email is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
 $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 

$mysqli = require __DIR__ . "/database.php"; //connect to db with object 

 $sql = "INSERT INTO user (email, login, real_name, password, birth_date, country_id)
         VALUES (?, ? ,?, ?, ? , ?)"; //protect from sql inject

 $stmt = $mysqli->stmt_init();

  print_r($_POST);
  var_dump($password_hash);
//  if(! $stmt->prepare($sql)){ 
//     die("SQL error: ". $mysqli->error);
//  } // caugh sintax errors 
// $stmt->bind_param("sssssi",
//                     $_POST["email"],
//                     $_POST["login"],
//                     $_POST["real_name"],
//                     $_POST["password"],
//                     $_POST["birth_date"],
//                     $_post["country_id"]
                  


// );
//  $stmt->execute();
//  echo "Success";





