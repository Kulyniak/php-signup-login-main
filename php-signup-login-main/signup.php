<?php
include("database.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <script>
        $(document).ready(function(){
            $(".countries").change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url:"database.php",
                    method: "POST",
                    data:{country_id:country_id},
                    success: function(data){
                        $(".database").html(data);
                    }
                })
            })
        });

    </script>
</head>
<body>
    
    <h1>Signup</h1>
    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="login">Login</label>
            <input type="text" id="login" name="login">
        </div>
        
        <div>
            <label for="real_name">Real name</label>
            <input type="text" id="real_name" name="real_name">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div>
            <label for="date">Birth date</label>
            <input type="date" id="date" name="date">
        </div><br>
        <div>
            <label >Country:</label>
            <select name="Country" class="country form">
            <option selected  ="selected"></option>
            <?php
                $sql = mysqli_query($mysqli, "SELECT * FROM countries");
                while ($row = mysqli_fetch_array($sql)){
                    ?>
                    <option value ="<?php echo $row['country_id']; ?>"> <?php echo $row['country_name']; ?></option>

                    <?php
                }
            ?>
            </select>

        </div><br><br>

        <div>
            <label for="agreement">Agreement</label>
            <input type="checkbox" id="agreement" name="agreement">
        </div><br>
        
        <button>Sign up</button>
    </form>
    
</body>
</html>









