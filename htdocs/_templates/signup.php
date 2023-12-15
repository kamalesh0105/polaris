<?php
$signup = false;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  if (!empty($username) && !empty($password)) {
    $error = user::signup($username, $password, $email, $phone);
    $signup = true;
  } else {
?>
    <script>
      window.location.href = "signup.php?signup_error";
    </script>
<?php
  }
}
?>

<?php if ($signup) { ?>
  <?php echo "signup-true"; ?>
  <?php if ($error) { ?>
    <?php Session::destroy(); ?>
    <script>
      window.location.href = "login.php";
    </script>
  <?php } else { ?>
    <script>
      window.location.href = "signup.php?signup_error";
    </script>
  <?php } ?>
<?php } else { ?>
  <main class="form-signup w-100 m-auto">
    <form method="post" action="signup.php">
      <img class="mb-4" src="https://academy.selfmade.ninja/assets/brand/logo-text.svg" alt="Not found" height="60">
      <h1 class="h3 mb-3 fw-normal">Please sign Up</h1>
      <div class="form-floating">
        <input name="username" type="text" class="form-control" id="floatingInputusername" placeholder="Username">
        <label for="floatingInputusername">Username</label>
      </div>
      <div class="form-floating">
        <input name="phone" type="text" class="form-control" id="floatingInputphone" placeholder="Phone">
        <label for="floatingInputphone">Phone</label>
      </div>
      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInputemail" placeholder="Email address">
        <label for="floatingInputemail">Email address</label>
      </div>
      <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="checkbox mb-3">
        <label class="rem-me">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <?php if (isset($_GET['signup_error'])) { ?>
        <div class="alert alert-danger" role="alert" style="height:50px;">
          Fill all the above details
        </div>
      <?php } ?>
      <button class="w-100 btn btn-lg btn-primary hvr-wobble-bottom" type="submit">Sign Up</button>
    </form>
  </main>
<?php } ?>