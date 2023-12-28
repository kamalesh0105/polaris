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
  <div id="modalsGarbage">
    <div class="modal fade animate__animated" id="dummy-dialog-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content blur" style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="<? get_config('base_path') ?>assets/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="<? get_config('base_path'); ?>/htdocs/assets/js/color-modes.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

  <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <!-- <script src="/htdocs/ js/app.min.js"></script>
  <script src="/htdocs/js/dialog.js"></script>
  <script src="/htdocs/js/toast.js"></script>
  <script src="/htdocs/js/demo.js"></script> -->
  <script src="/js/app.js"></script>
  <script src="/js/dialog.js"></script>
  <script src="/js/toast.js"></script>
  <!-- <script src="/js/demo.js"></script> -->
</body>

</html>