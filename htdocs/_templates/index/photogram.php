<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row" data-masonry='{" percentPosition": true }'>
      <?
      $posts = Post::getAllPosts();

      use Carbon\Carbon;

      foreach ($posts as $post) {
        $p = new Post($post['id']);
        $img_path = get_config('upload_path') . $p->getimage_uri();
        $upload_time = Carbon::parse($p->getupload_time());
        $upload_time_string = $upload_time->diffForHumans();


      ?>
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="<?= "images.php/?name=" . $img_path; ?>" width="100%" height="100%">
            <div class="card-body">
              <p class="card-text"><?= $p->getpost_text(); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-primary">like</button>
                  <button type="button" class="btn btn-sm btn-outline-success">share</button>
                  <?
                  $owner = $p->getowner();
                  if (Session::isOwnerof($owner)) { ?>
                    <button type="button" class="btn btn-sm btn-outline-danger">delete</button>
                  <? } ?>
                </div>
                <small class="text-body-secondary"><?= $upload_time_string ?></small>
              </div>
            </div>
          </div>
        </div>
      <?php
      } ?>
    </div>
  </div>
</div>