<?php
include "app/libs/load.php";
$signup=false;?>
<div class="db-data">
  <?print_r($_POST);
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['phone'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    echo "into_db";
    $error=signup($username,$password,$email,$phone);
    $signup=true;
}
?>
</div>

<?if($signup){
  echo"signup-true";
  if(!$error){
    ?>
    <main class="container">
  <div class="bg-body-tertiary p-5 rounded mt-3">
    <h1>signup sucess</h1>
    <p class="lead">Now you can <a href="/app/login.php">login...</a></p>
  </div>
</main>
  <?}else{?>
    <main class="container">
  <div class="bg-body-tertiary p-5 rounded mt-3">
    <h1>signup failed</h1>
    <p class="lead">something went wrong....<?=$error?></p>
  </div>
</main>
<?}?>
<?}else{?>





<main class="form-signup w-100 m-auto">
  <form method="post" action="signup.php">
    <img class="mb-4" src="https://academy.selfmade.ninja/assets/brand/logo-text.svg" alt="Not found" height="60">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input  name="username" type="text" class="form-control" id="floatingInputusername" placeholder="name@example.com" fdprocessedid="ejh8ed">
      <label for="floatingInputusername">username</label>
    </div>
    <div class="form-floating">
      <input  name="phone" type="text" class="form-control" id="floatingInputphone" placeholder="name@example.com" fdprocessedid="ejh8ed">
      <label for="floatingInputphone">Phone</label>
    </div>
    <div class="form-floating">
      <input  name="email" type="email" class="form-control" id="floatingInputemail" placeholder="name@example.com" fdprocessedid="ejh8ed">
      <label for="floatingInput">Email address</label>
    </div>
    
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" fdprocessedid="lbqjnc">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label class="rem-me">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary hvr-wobble-bottom" type="submit" fdprocessedid="p44mr9" >Sign in</button>
  </form>
</main>
<?}?>