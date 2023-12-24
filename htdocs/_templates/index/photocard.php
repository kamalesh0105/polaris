<div class="col-lg-3 mb-4" id="post-<?= $post['id'] ?>">
    <div class="card">
        <img class="bd-placeholder-img card-img-top" src="<?= "images.php/?name=" . $img_path; ?>">
        <div class="card-body">
            <p class="card-text"><?= $p->getpost_text(); ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group" data-id="<?= $post['id'] ?>">
                    <button type="button" class="btn btn-sm btn-outline-primary btn-like">like</button>
                    <button type="button" class="btn btn-sm btn-outline-success btn-share">share</button>
                    <?php
                    $owner = $p->getowner();
                    if (Session::isOwnerof($owner)) { ?>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete">delete</button>
                    <?php } ?>
                </div>
                <small class="text-body-secondary"><?= $upload_time_string ?></small>
            </div>
        </div>
    </div>
</div>