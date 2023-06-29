<?php
//include "photogram/libs/load.php";
$signup=false;?>
<div class="db-data">
  <?
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['phone'])) {
    echo"inside";
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    if($username!=null and $password!=null) {
        $error=user::signup($username, $password, $email, $phone);
        $signup=true;
    } else {?>
   <script>
	window.location.href = "signup.php?signup_error"
</script><?php
    }
}
?>
</div>

<?if($signup){
  echo"signup-true";
  if(!$error){
    Session::destroy();
    ?>
    <script>
window.location.href = "login.php"
</script>
  <?}else{?>
    <script>
	window.location.href = "signup.php?signup_error"
</script>
    
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
    <?if(isset($_GET['signup_error'])){?>
      <div class="alert alert-danger" role="alert" style="height:50px;">
      Fill all the above details
     </div>
    <?}?>
    <button class="w-100 btn btn-lg btn-primary hvr-wobble-bottom" type="submit" fdprocessedid="p44mr9" >Sign in</button>
  </form>
</main>
<?}?>