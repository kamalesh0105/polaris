/*made by jarvis*/var $grid = $("#masonry-area").masonry({
  // options...
  //   itemselector: ".col",
  //   columnWidthL: ".col",
  percentPosition: true,
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress(function () {
  $grid.masonry("layout");
});
$(".btn-delete").on("click", function () {
  d = new Dialog("Delete Post", "Are you sure want to delete the pots?");
  post_id = $(this).parent().attr("data-id");
  d.setButtons([
    {
      name: "delete",
      class: "btn-danger",
      onClick: function (event) {
        console.log(`Assume the Post ${post_id} is deleted`);
        $(`#post-${post_id}`).remove();
        //console.log($(this));
        $(event.data.modal).modal("hide");
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

//# sourceMappingURL=app.js.map