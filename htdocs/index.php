<?php
include "libs/load.php";
print("oo".__DIR__."00");

?>





<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php load_template("_head");?>

  <body>
    
    

<?php load_template("_header");   ?>

</header>
<main>

 <?php load_template("_calltoaction");?>

<?php load_template("_photogram") ; ?>
</main>

<?php load_template("_footer"); ?>


    <script src="<?get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
