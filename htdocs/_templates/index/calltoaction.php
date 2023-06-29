<section class="py-5 text-center container">
<div class="row py-lg-5">
  <form method="post" enctype="multipart/form-data" action="test.php">
  <div class="col-lg-6 col-md-8 mx-auto">
    <h1 class="fw-light"> What are you upto,<?=Session::getuser()->getUsername('auth')?> ?</h1>
    <p class="lead text-body-secondary">share a photo that talks about it.</p>
    <textarea id="post_text" name="post_text" class="form-control" placeholder="Howdy?"></textarea>
    <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02" name="post_image">
 
</div>
<P>
      <button class="btn btn-primary my-2">upload</button>
</P>
  </div>
  </form>
</div>
</section>
