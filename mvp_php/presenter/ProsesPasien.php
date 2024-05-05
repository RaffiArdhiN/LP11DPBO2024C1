<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelp($row['telp']); //mengisi telp


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}
    function create($data)
    {
        try {
            $this->tabelpasien->open();
            $insertedData = $this->tabelpasien->add($data); // Menambahkan data pasien ke dalam tabel
            if ($insertedData) {
                $this->data[] = $insertedData; // Menambahkan data pasien baru ke dalam list
            } else {
                // Data gagal ditambahkan, berikan pesan error
                echo "Failed to add data to database.";
            }
            // Tutup koneksi
            $this->tabelpasien->close();
			header("location: index.php");
			exit();
        } catch (Exception $e) {
            // Memproses error dengan lebih baik, misalnya dengan log atau tindakan yang sesuai
            echo "Error: " . $e->getMessage();
        }
    }
    function delete($id)
    {
        try {
            $this->tabelpasien->open();
            $this->tabelpasien->del($id); // Menambahkan data pasien ke dalam tabel
            // Tutup koneksi
            $this->tabelpasien->close();
			header("location: index.php");
			exit();
        } catch (Exception $e) {
            // Memproses error dengan lebih baik, misalnya dengan log atau tindakan yang sesuai
            echo "Error: " . $e->getMessage();
        }
    }
	function update($id) {
		try {
			var_dump($id);
			$this->tabelpasien->open();
			// $data = $this->tabelpasien->getPasienById($id['id']); // Mengambil ID saja dari array $id
			// var_dump($data);
			$this->tabelpasien->edit($id);
			$this->tabelpasien->close();
			header("location: index.php");
			exit();
		} catch (Exception $e) {
			// Memproses error dengan lebih baik, misalnya dengan log atau tindakan yang sesuai
			echo "Error: " . $e->getMessage();
		}
	}
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelp($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
