<?php
if (Session::isset("renderTime")) {
  $renderTime = Session::get("renderTime");
}
?>
<footer class="text-body-secondary py-4 fixed-footer bg-transparent">
  <div class="container">
    <div class="row">
      <div class="col d-flex align-items-center">
        <p id="setcolor" class="lead fs-6 mb-0">Made with ❤️ @ polaris.dev © 2023</p>
      </div>
      <div class="col d-flex align-items-center">
        <p class="setcolor mb-0 lead fs-6" id="setcolor">
          <?php echo "Page Rendered in " . number_format($renderTime, 4) . " ms"; ?>
        </p>
      </div>
      <div class="col d-flex align-items-center">
        <p class="float-end mb-0 fs-6 lead">
          <a class="ankor-link" href="#" id="setcolor">Back to top</a>
        </p>
      </div>
    </div>
  </div>
</footer>