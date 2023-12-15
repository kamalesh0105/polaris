<?

use phpDocumentor\Reflection\PseudoTypes\True_;

if (isset($_POST['post_text']) and isset($_FILES['post_image'])) {
  $image_tmp = $_FILES['post_image']['tmp_name'];
  $text = $_POST['post_text'];
  $res = Post::registerPost($text, $image_tmp);
  if ($res) {
?>
    <script>
      window.location.href = "index.php?upload_success";
    </script>

<?
    echo  "uploadd success";
  } else {
    echo "upload Failed";
  }
}
?>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <form method="post" enctype="multipart/form-data" action="index.php">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"> What are you upto,<?= Session::getuser()->getUsername('auth') ?> ?</h1>
        <p class="lead text-body-secondary">share a photo that talks about it.</p>
        <textarea id="post_text" name="post_text" class="form-control" placeholder="Howdy?"></textarea>
        <div class="input-group mb-3">
          <input type="file" class="form-control" accept="image/*" id="inputGroupFile02" name="post_image">

        </div>
        <P>
          <button class="btn btn-primary my-2">upload</button>
        </P>
        <? if (isset($_GET['upload_success'])) { ?>
          <div class="alert alert-info" role="alert">
            Upload Success!
          </div>
        <? } ?>
      </div>
    </form>
  </div>
</section>