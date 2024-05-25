//ambil element yang dibutuhkan
let keyword = document.getElementById("keyword");
let button = document.getElementById("tombol-cari");
let container = document.getElementById("container");

//tambahkan evenet ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  //buat object ajax
  let xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  //eksekusi ajax
  xhr.open("GET", "ajax/anime.php?keyword=" + keyword.value, true);
  xhr.send();
});
