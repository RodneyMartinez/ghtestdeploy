<?php 
    if(isset($_POST	['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connect = mysqli_connect('localhost', 'root', '', 'registro_sin_db');
        if($connect) {
            if($username && $password) {
                echo "It works!<br>";
                echo "Welcome $username!<br>";
                echo "Your password: $password was hacked :(<br>";
                echo "Do please, change it immediately!"; 
                
                $query = "INSERT INTO Userdata(username,password) ";
                $query .= "VALUES ('$username', '$password')";
                $result = mysqli_query($connect, $query);
                echo "User with the username: $username was created successfully!";

            } else {
                die("Query failed: ". mysqli_error() );
            }
             
        } else {
            die("SOMETHING WENT WRONG: ".mysqli_errno());
        }
    }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="main-styles.css" rel="stylesheet" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="col-sm-6 login">
            <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group submit">
                    <input type="submit" class="btn btn-primary submit" name="submit" value="Create">
                </div>
            </form>
        </div>
    </div>
</body>
</html>