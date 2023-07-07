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
