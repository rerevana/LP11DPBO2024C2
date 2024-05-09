<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class EditPasien implements KontrakData1
{
	private $prosespasien;
    private $tpl;

    function __construct()
    {
        // Konstruktor
        $this->prosespasien = new ProsesPasien();
    }

	function edit($id)
	{

		// Mendapatkan data pasien berdasarkan ID dari database
		$dataPasien = $this->prosespasien->getDataPasienById($id); 

		$data = '<div class="container">
			<h3 style="text-align: center;">Edit Data Pasien</h3><br>
			<form action="index.php" method="POST">

				<div class="form-group">
					<input type="hidden" id="id" name="id" value="' . $dataPasien['id'] . '" required>
				</div>

				<div class="form-group">
					<label for="nik">NIK:</label>
					<input type="text" id="nik" name="nik" value="' . $dataPasien['nik'] . '" required>
				</div>
				
				<div class="form-group">
					<label for="nama">Nama:</label>
					<input type="text" id="nama" name="nama" value="' . $dataPasien['nama'] . '" required>
				</div>
				
				<div class="form-group">
					<label for="tempat">Tempat Lahir:</label>
					<input type="text" id="tempat" name="tempat" value="' . $dataPasien['tempat'] . '" required>
				</div>
				
				<div class="form-group">
					<label for="tl">Tanggal Lahir:</label>
					<input type="date" id="tl" name="tl" value="' . $dataPasien['tl'] . '" required>
				</div>
				
				<div class="form-group">
					<label for="gender">Jenis Kelamin:</label>
					<select id="gender" name="gender" required>
						<option value="" disabled>Pilih jenis kelamin</option>
						<option value="Laki-laki" ' . ($dataPasien['gender'] == 'Laki-laki' ? 'selected' : '') . '>Laki-laki</option>
						<option value="Perempuan" ' . ($dataPasien['gender'] == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" value="' . $dataPasien['email'] . '" required>
				</div>
				
				<div class="form-group">
					<label for="telp">Telepon:</label>
					<input type="text" id="telp" name="telp" value="' . $dataPasien['telp'] . '" required>
				</div>
				
				<button type="submit" name="update">Edit Data</button>
				<button type="cancel">Kembali</button>
			</form>
		</div>';

		$tpl = new Template("templates/skinform.html");
		$tpl->replace("DATA_FORM", $data);
		$tpl->write();
	}

}
