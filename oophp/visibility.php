<?php 

//jualan produk : komik & game
class Produk{
    public $judul;
    public $penulis;
    public $penerbit;

    protected $diskon = 0;
    private $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon /100);    }

    public function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. $this->harga)";
        return $str;
    }
}

// class CetakInfoProduk{
//     public function cetak(Produk $produk){
//         $str = "{$produk->judul} | {$produk->getLabel()} (Rp. $produk->harga)";
//         return $str;
//     }
// }

//inheritance produk -> komik
class Komik extends Produk{
    public $halaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $halaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->halaman = $halaman;
    }

    public function getInfoProduk(){
        $str = "Komik : ". parent::getInfoProduk() . " - {$this->halaman} Halaman.";
        return $str;
    }
}

//inheritance produk -> komik
class Game extends Produk{
    public $jam;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jam = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jam = $jam;
    }

    public function setDiskon( $diskon ){
        $this->diskon = $diskon;
    }

    public function getInfoProduk(){
        $str = "Komik : ". parent::getInfoProduk() . " ~ {$this->jam} Jam.";
        return $str;
    }
}


$komik1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$game1 = new Game("Persona 5 Royal", "Daiki Ito", "Atlus", 700000, 101);

// $infoProduk = new CetakInfoProduk();

echo $komik1->getInfoProduk();
echo "<br>";
echo $game1->getInfoProduk();
echo "<br>";
echo "<hr>";
$game1->setDiskon(50);
echo $game1->getHarga();


// echo "Komik: $produk3->penulis, $produk3->penerbit";
// echo "<br>";
// echo $produk3->getLabel();
// echo "<br>";

// echo $infoProduk->cetak($produk3);


?>