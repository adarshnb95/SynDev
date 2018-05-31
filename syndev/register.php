<head>
<link rel="stylesheet" type="text/css" href="dj.css">
</head>
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action ="register.php" method = "POST" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                                <input name="username" type="text" id="inputname" class="form-control" placeholder="Username" required autofocus>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <input name="confirm password" type="password" id="inputcpassword" class="form-control" placeholder="Confirm password" required autofocus>
       
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=syndev;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


if(isset($_POST["username"]))
{
    $query = "INSERT INTO users (username,email,password,reg_time) VALUES(:username,:email,:password,:reg_time)";
    $obj = $dbh->prepare($query);
    $obj->execute(array($_POST["username"],$_POST["email"],md5($_POST["password"]),  time()));
}

?>