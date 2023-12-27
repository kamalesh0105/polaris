var $grid = $("#masonry-area").masonry({
  // options...
  //   itemselector: ".col",
  //   columnWidthL: ".col",
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

$(".album .btn-like").on("click", function () {
  postid = $(this).parent().attr("data-id");
  $this = $(this);
  $(this).html() == "like" ? $(this).html("liked") : $(this).html("like");
  $(this).hasClass("btn-outline-primary")
    ? $(this).removeClass("btn-outline-primary").addClass("btn-danger")
    : $(this).removeClass("btn-primary").addClass("btn-outline-primary");
  console.log("Like button got toggled");
  $.post("/api/post/like", { id: postid }, function (data, response, xhr) {
    console.log(response);
    if (response == "success") {
      if (data.liked) {
        $(this).html("liked");
        $(this).removeClass("btn-outline-primary").addClass("btn-primary");
      } else {
        $(this).html("like");
        $(this).removeClass("btn-primary").addClass("btn-outline-primary");
      }
    }
  });
});
