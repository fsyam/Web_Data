jQuery(document).ready(function () {
  // hilangkan tombol cari
  jQuery("#tombol-cari").hide();
  // event ketika keyword ditulis
  jQuery("#keyword").on("keyup", function () {
    // munculkan icon loading
    jQuery(".loader").show();

    //ajak menggunakan load
    // jQuery("#container").load(
    //   "ajax/mahasiswa.php?keyword=" + $("#keyword").val()
    // );

    // $.get()
    jQuery.get(
      "ajak/mahasiswa.php?keyword=" + jQuery("#keyword").val(),
      function (data) {
        jQuery("#container").html(data);
        jQuery(".loader").hide();
      }
    );
  });
  //
});
