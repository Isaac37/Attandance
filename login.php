<?php
$title = 'Login';
require_once 'includes/header.php';
require_once 'db/conn.php';
//if data was submitted via a form POST request 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password =  md5($password.$username);

    $result =$user->getUser($username, $new_password);
    if (!$result) {
        # code...
        echo '<div class="alert alert-danger">Username or password is Incorrect please try again.</div>';
    } else {
        # code...
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: viewrecords.php");
    }
    
}
?>


<br />
<br />
<h1 class = "text-center"><?php echo "$title" ?></h1>
<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" required name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'];?>">
    
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" required name="password" class="form-control" id="password">
   
</div>
 
  <button type="submit" value="Login" class="btn btn-primary btn-block">Login</button>
  <br />
  <a href="">Forgot Password</a>
</form>

<br />
<br />
<br />
<br />
<?php require_once 'includes/footer.php' ?>