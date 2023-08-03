$("#liveToastBtn").on("click", function () {
  var el = $("#liveToast");
  $(el).append();
  new bootstrap.Toast(el).show();
});
