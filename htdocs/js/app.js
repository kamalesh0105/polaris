let $grid = $("#masonry-area").masonry({
  // itemSelector: '.col',
  // columnWidth: '.col',
  percentPosition: true,
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress(function () {
  $grid.masonry("layout");
});

//delete post image
$(".btn-delete").on("click", function () {
  d = new Dialog("Delete Post", "Are you sure want to delete the pots?");
  post_id = $(this).parent().attr("data-id");
  d.setButtons([
    {
      name: "delete",
      class: "btn-danger",
      onClick: function (event) {
        console.log(`Assume this post ${post_id} is deleted i got called`);
        $.post(
          "/api/post/delete",
          { id: post_id },
          function (data, response, xhr) {
            console.log(response);
            console.log("API Data:" + data);
            if (response == "success") {
              var el = $(`#post-${post_id}`)[0];
              $grid.masonry("remove", el).masonry("layout");
            }
          }
        );
        //         //console.log($(this));
        $(event.data.modal).modal("hide");
        t = new Toast(
          "notification",
          "success",
          "delete success",

          {
            placement: "bottom-right",
          }
        );
        t.show();
      },
    },
    {
      name: "cancel",
      class: "btn-secondary",
      onClick: function (event) {
        $(event.data.modal).modal("hide");
      },
    },
  ]);
  d.show();
});

//toast test
$(document).ready(function () {
  t = new Toast("ignore me", "welcome", "hey there?", {
    placement: "bottom-right",
  });
  t.show();
});

//url reset
$(document).ready(function () {
  const urlParams = new URLSearchParams(window.location.search);
  const isSuccess = urlParams.get("upload_success") === "true";
  if (isSuccess) {
    setTimeout(() => {
      window.location.href = "http://localhost/index.php"; //resetting the url to default
    }, 3000);
  }
});

//like toggle function
// like toggle function
$(document).on("click", ".album .btn-like", function () {
  postid = $(this).parent().attr("data-id");
  $this = $(this);

  $(this).html() == "Like" ? $(this).html("Liked") : $(this).html("Like");
  $(this).hasClass("btn-outline-danger")
    ? $(this).removeClass("btn-outline-danger").addClass("btn-danger")
    : $(this).removeClass("btn-danger").addClass("btn-outline-danger");

  console.log("Like button got toggled");

  $.post("/api/post/like", { id: postid }, function (data, response, xhr) {
    console.log(response);
    if (response == "success") {
      if (data.Liked) {
        $($this).html("Liked");
        $($this).removeClass("btn-outline-danger").addClass("btn-danger");
      } else {
        $($this).html("Like");
        $($this).removeClass("btn-danger").addClass("btn-outline-danger");
      }
    }
  });
});
