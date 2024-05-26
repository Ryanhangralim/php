<?php 

class Mahasiswa_model{
    // data base handler & statement
    private $dbh, $stmt;

    //koneksi ke database
    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=localhost;dbname=phpdasar";

        //try catch koneksi dengan database menggunakan PDO
        try{
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>