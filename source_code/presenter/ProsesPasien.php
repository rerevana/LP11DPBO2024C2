<?php

include_once("KontrakPresenter.php");
// include("model/TabelPasien.class.php");

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
				$pasien->setEmail($row['email']); //mengisi tl
				$pasien->setTelp($row['telp']); //mengisi gender


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function editDataPasien($id, $data)
    {
        try {
            // Proses pengeditan data pasien
            $this->tabelpasien->open();
            $this->tabelpasien->updatePasien($id, $data);
            $this->tabelpasien->close();

            // Refresh data setelah pengeditan
            $this->prosesDataPasien();
        } catch (Exception $e) {
            // Handle error
            echo "Error editing data pasien: " . $e->getMessage();
        }
    }

	function getDataPasienById($id)
    {
        try {
            // Proses pengeditan data pasien
            $this->tabelpasien->open();
            $this->tabelpasien->getPasienById($id);
            $this->tabelpasien->close();

            // Refresh data setelah pengeditan
            // $this->prosesDataPasien();
			return $this->tabelpasien->getResult();
        } catch (Exception $e) {
            // Handle error
            echo "Error: " . $e->getMessage();
        }
    }

	function tambahDataPasien($data)
    {
        try {
            // Proses penambahan data pasien
            $this->tabelpasien->open();
            $this->tabelpasien->tambahPasien($data);
            $this->tabelpasien->close();

            // Refresh data setelah penambahan
            $this->prosesDataPasien();
        } catch (Exception $e) {
            // Handle error
            echo "Error adding data pasien: " . $e->getMessage();
        }
    }

    function hapusDataPasien($id)
    {
        try {
            // Proses penghapusan data pasien
            $this->tabelpasien->open();
            $this->tabelpasien->hapusPasien($id);
            $this->tabelpasien->close();

            // Refresh data setelah penghapusan
            $this->prosesDataPasien();
        } catch (Exception $e) {
            // Handle error
            echo "Error deleting data pasien: " . $e->getMessage();
        }
    }

	function prosesDataPasienById($id)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienById($id);
			$result = $this->tabelpasien->getResult();
			$this->tabelpasien->close();

			// Log pesan untuk memeriksa hasil
			error_log("Data Pasien By ID: " . print_r($result, true));

			return $result;
		} catch (Exception $e) {
			echo "wiw error part 6" . $e->getMessage();
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

	function getSize()
	{
		return sizeof($this->data);
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
	
}
