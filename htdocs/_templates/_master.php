<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php Session::loadtemplate("_head");?>

  <body>
    
    

<?php Session::loadtemplate("_header");   ?>

</header>
<main>
<? Session::loadtemplate(Session::currentscript());?>
</main>

<?php Session::loadtemplate("_footer"); ?>


    <script src="<?get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
