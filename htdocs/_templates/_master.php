<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php
Session::loadtemplate("_head");
$startTime = Plugin::startRender();

?>

<body>



  <?php Session::loadtemplate("_header");   ?>
  <div class="wrap-container">
    </header>
    <main>
      <? Session::loadtemplate(Session::currentscript()); ?>
    </main>

    <?php
    $renderTime = Plugin::renderTime($startTime);
    Session::set("renderTime", $renderTime);
    Session::loadtemplate("_footer"); ?>
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
  </div>


  <script src="<? get_config('base_path') ?>assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <script src="/js/app.js"></script>
  <script src="/js/dialog.js"></script>
  <script src="/js/toast.js"></script>
</body>

</html>