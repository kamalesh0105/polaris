/*made by jarvis*/$("#liveToastBtn").on("click", function () {
  var el = $("#liveToast");
  $(el).append();
  new bootstrap.Toast(el).show();
});

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
// $(".btn-delete").on("click", function () {
//   d = new Dialog("Delete Post", "Are you sure want to delete the pots?");
//   post_id = $(this).parent().attr("data-id");
//   d.setButtons([
//     {
//       name: "delete",
//       class: "btn-danger",
//       onClick: function (event) {
//         console.log(`Assume the Post ${post_id} is deleted`);
//         $(`#post-${post_id}`).remove();
//         //console.log($(this));
//         $(event.data.modal).modal("hide");
//         t = new Toast(
//           "notification",
//           "success",
//           "delete success",

//           {
//             placement: "bottom-right",
//           }
//         );
//         t.show();
//       },
//     },
//     {
//       name: "cancel",
//       class: "btn-secondary",
//       onClick: function (event) {
//         $(event.data.modal).modal("hide");
//       },
//     },
//   ]);
//   d.show();
// });
// //self
$(document).ready(function () {
  t = new Toast("ignore me", "welcome", "hey there?", {
    placement: "bottom-right",
  });
  t.show();
});
function ondeleteclicked(post_id) {
  console.log(`Assume this post ${post_id} is deleted i got called`);
  $.post("localhost/api/post/delete.php"),
    { id: post_id },
    function (data, response, xhr) {
      console.log(response);
      console.log("API Data:".data);
      var el = $(`#post-${post_id}`)[0];
      $grid.masonry("remove", el).masonry("layout");
    };
}

function oncancelclicked(Dialog) {
  dialog.hide();
}
$(document).on("click", ".album .btn-delete", function () {
  post_id = $(this).parent().attr("data-id");
  d = new Dialog("Delete Post ,Are you sure deleting this post?");
  d.setButtons([
    {
      name: "Delete",
      class: "btn-danger",
      onclick: function (event) {
        ondeleteclicked(post_id);
        d.hide();
      },
    },
    {
      name: "cancel",
      class: "btn-danger",
      onclick: function (event) {
        oncancelclicked(d);
      },
    },
  ]);
  d.show();
});

//# sourceMappingURL=app.js.map