<?php
$username=$_POST["username"];
$password=$_POST["password"];
//echo $username;
$result=verify_credentials($username,$password);
if($result){
  ?>
  <main class="container">
  <div class="bg-body-tertiary p-5 rounded mt-3">
    <h1>login sucess</h1>
    <p class="lead">login success dude......</p>
  </div>
</main>

<?php

}else{
    ?>

<main class="form-signin w-100 m-auto">
  <form method="post" action="login.php">
    <img class="mb-4" src="https://academy.selfmade.ninja/assets/brand/logo-text.svg" alt="Not found" height="60">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input  name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" fdprocessedid="ejh8ed">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" fdprocessedid="lbqjnc">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary hvr-wobble-bottom" type="submit" fdprocessedid="p44mr9" >Sign in</button>
  </form>
</main>


<?php }?>