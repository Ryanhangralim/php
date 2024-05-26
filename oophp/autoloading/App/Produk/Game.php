<?php 
class Game extends Produk implements InfoProduk{
    public $jam;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jam = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jam = $jam;
    }

    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. $this->harga)";
        return $str;
    }

    public function getInfoProduk(){
        $str = "Game : ". $this->getInfo() . " ~ {$this->jam} Jam.";
        return $str;
    }
}
?>