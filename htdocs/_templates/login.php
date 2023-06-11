<?php
$login=true;
//Session::set('mode','web');
//Session::set('test','websksjs');
if(isset($_POST['username']) and isset($_POST['password'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $result=Usersession::authenticate($username,$password);
 // echo 'res'.$result;
  $login=false;
}
//echo $username;
//$result=verify_credentials($username,$password);
    if(!$login) {
        echo"log=$result";
        if($result) {
            echo"sup dude";
            ?>
            
            <script>
	window.location.href = "<?=get_config('base_path');?>"
</script>


  <?} else {
      echo "out-$login";
      ?>
    <main class="container">
      <div class="bt-light p-5 rounded mt-3">
        <h1>login failed</h1>
        <p class="lead">try logging in again</p>
      </div>
    </main>
   <?php
  }?>

<?php

    } else {
        echo "loop and";
        ?>
<main class="form-signin w-100 m-auto">
  <form method="post" action="login.php">
    <img class="mb-4" src="https://academy.selfmade.ninja/assets/brand/logo-text.svg" alt="Not found" height="60">
    <input  name="fingerprint" type="hidden" class="form-control" id="fingerprint" val="">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input  name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" fdprocessedid="ejh8ed" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" fdprocessedid="lbqjnc" required>
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


<?php }?>