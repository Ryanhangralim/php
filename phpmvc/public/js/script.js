$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#judulModal").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Tambah data");
    $("#nama").val("");
    $("#nim").val("");
    $("#email").val("");
    $("#jurusan").val("Teknik Informatika");
  });

  $(".tampilModalUbah").on("click", function () {
    $("#judulModal").html("Ubah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Ubah data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/php/phpmvc/public/mahasiswa/ubah"
    );
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/php/phpmvc/public/mahasiswa/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#nim").val(data.nim);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});
