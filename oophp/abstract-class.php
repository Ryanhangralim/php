<?php 

//jualan produk : komik & game
abstract class Produk{
    private $judul;
    private $penulis;
    private $penerbit;
    private $harga;
    private $diskon = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul($judul){
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    public function setPenulis($penulis){
        $this->penulis = $penulis;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    public function setPenerbit($penerbit){
        $this->penerbit = $penerbit;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setHarga( $harga ){
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon /100);    }

    public function setDiskon( $diskon ){
        $this->diskon = $diskon;
    }

    public function getDiskon(){
        return $this->diskon;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }


    abstract public function getInfoProduk();
    
    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. $this->harga)";
        return $str;
    }
}

class CetakInfoProduk{
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk){
        $this->daftarProduk[] = $produk;
    }

    public function cetak(){
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p){
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}

//inheritance produk -> komik
class Komik extends Produk{
    public $halaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $halaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->halaman = $halaman;
    }

    public function getInfoProduk(){
        $str = "Komik : ". $this->getInfo() . " - {$this->halaman} Halaman.";
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

    public function getInfoProduk(){
        $str = "Game : ". $this->getInfo() . " ~ {$this->jam} Jam.";
        return $str;
    }
}


$komik1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$game1 = new Game("Persona 5 Royal", "Daiki Ito", "Atlus", 700000, 101);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $komik1 );
$cetakProduk->tambahProduk( $game1 );

echo $cetakProduk->cetak();

?>