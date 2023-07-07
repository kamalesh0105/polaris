<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php Session::loadtemplate("_head"); ?>

<body>



  <?php Session::loadtemplate("_header");   ?>

  </header>
  <main>
    <? Session::loadtemplate(Session::currentscript()); ?>
  </main>

  <?php Session::loadtemplate("_footer"); ?>


  <script src="<? get_config('base_path') ?>assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<? get_config('base_path'); ?>assets/js/color-modes.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <script src="/htdocs/js/app.min.js"></script>
</body>

</html>