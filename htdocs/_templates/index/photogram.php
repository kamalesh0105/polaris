<div class="album py-5 bg-light">
  <div class="container">
    <div class="row" id="masonry-area">
      <?php
      $posts = Post::getAllPosts();
      $data = Like::isliked_frontend();

      use Carbon\Carbon;

      if ($posts != null) {
        foreach ($posts as $post) {
          $p = new Post($post['id']);
          $img_path = get_config('upload_path') . $p->getimage_uri();
          $upload_time = Carbon::parse($p->getupload_time());
          $upload_time_string = $upload_time->diffForHumans(); ?>
          <div class="col-lg-3 mb-4" id="post-<?= $post['id'] ?>">
            <div class="card">
              <img class="bd-placeholder-img card-img-top" src="<?= "images.php/?name=" . $img_path; ?>">
              <div class="card-body">
                <p class="card-text"><?= $p->getpost_text(); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group" data-id="<?= $post['id'] ?>">
                    <? if ($data && in_array($post['id'], $data)) {
                    ?>
                      <button type="button" class="btn btn-sm btn-danger btn-like">Liked</button>
                    <?
                    } else { ?>
                      <button type="button" class="btn btn-sm btn-outline-danger btn-like">Like</button>
                    <? } ?>
                    <button type="button" class="btn btn-sm btn-outline-success btn-share">share</button>
                    <?php
                    $owner = $p->getowner();
                    if (Session::isOwnerof($owner)) { ?>
                      <button type="button" class="btn btn-sm btn-outline-primary btn-delete">delete</button>
                    <?php } ?>
                  </div>
                  <small class="text-body-secondary"><?= $upload_time_string ?></small>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <h1 class="display-4 fw-bold text-body-emphasis text-center" style="color:grey !important">No Posts Yet!</h1>
      <?php } ?>
    </div>
  </div>
</div>