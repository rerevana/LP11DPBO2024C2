<?php

 class TabelPasien extends DB
 {
	// Metode untuk mengambil semua data pasien
	function getPasien()
	{
		// Query MySQL untuk memilih semua data pasien
		$query = "SELECT * FROM pasien";
		// Eksekusi query dan kembalikan hasilnya
		return $this->execute($query);
	}

	 function getPasienById($id)
	{
		// Query MySQL untuk memilih semua data pasien
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Eksekusi query dan kembalikan hasilnya
		return $this->execute($query);
		// return $this->getResult();
	}
 
	// Metode untuk menambah data pasien
	function tambahPasien($data)
	{
		// Ekstraksi data dari array $data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		
		// Query MySQL untuk menambahkan data pasien baru
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Eksekusi query dan kembalikan jumlah baris yang terpengaruh
		return $this->executeAffected($query);
	}
 
	// Metode untuk mengupdate data pasien berdasarkan ID
	function updatePasien($id, $data)
	{
		// Ekstraksi data dari array $data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		
		// Query MySQL untuk mengupdate data pasien berdasarkan ID
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id=$id";
		// Eksekusi query dan kembalikan jumlah baris yang terpengaruh
		return $this->executeAffected($query);
	}
 
	// Metode untuk menghapus data pasien berdasarkan ID
	function hapusPasien($id)
	{
		// Query MySQL untuk menghapus data pasien berdasarkan ID
		$query = "DELETE FROM pasien WHERE id=$id";
		// Eksekusi query dan kembalikan jumlah baris yang terpengaruh
		return $this->executeAffected($query);
	}
 }
 
