<?php
include 'dbBroker.php';
include 'model/user.php';

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

    $uname=$_POST['username'];
    $upass=$_POST['password'];
    $conn=new mysqli();

    $korisnik=new User(null,$uname,$upass);
    $odgovor=User::loginUser($uname,$upass,$conn);

    if($odgovor->num_rows==1){
        $_SESSION['userID']=$korisnik->id;
        header('Location: home.php');
        exit();
    }else{

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>