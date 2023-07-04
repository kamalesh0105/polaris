<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?
      $posts=Post::getAllPosts();
foreach($posts as $post) {
    $p=new Post($post[0]['id']);

    ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?$p->getimage_uri();?>" width="100%" height="100%">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <div class="card-body">
              <p class="card-text"><?$p->getpost_text();?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">like</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">share</button>
                </div>
                <small class="text-body-secondary">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <?php
}?>  
      </div>
    </div>
  </div>