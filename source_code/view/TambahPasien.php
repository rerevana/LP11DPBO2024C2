<?php

include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TambahPasien implements KontrakData
{
    private $prosespasien;
    private $tpl;

    function __construct()
    {
        // Konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tambah()
    {
        $data = '<div class="container">
        <h3 style="text-align: center;">Data Tambah Pasien</h3><br>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" required>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="tempat">Tempat Lahir:</label>
                <input type="text" id="tempat" name="tempat" required>
            </div>
            
            <div class="form-group">
                <label for="tl">Tanggal Lahir:</label>
                <input type="date" id="tl" name="tl" required>
            </div>
            
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="telp">Telepon:</label>
                <input type="text" id="telp" name="telp" required>
            </div>
            
            <button type="submit" name="add">Tambahkan Data</button>
            <button type="cancel">Kembali</button>
        </form>
    </div>';

        $tpl = new Template("templates/skinform.html");
        $tpl->replace("DATA_FORM", $data);
        $tpl->write();
    }

}
