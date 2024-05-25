<?php 

//jualan produk : komik & game
class Produk{
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel(){
        return "$this->judul, $this->penerbit";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1)

$produk3 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
// $produk3->judul = "Naruto";
// $produk3->penulis = "Masashi Kisihimoto";
// $produk3->penerbit = "Shonen Jump";
// $produk3->harga = 30000;

echo "Komik: $produk3->penulis, $produk3->penerbit";
echo "<br>";
echo $produk3->getLabel();


?>