<?php

include("KontrakView.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
    {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        // Semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            // Menggunakan data yang benar dari proses pasien
            $data .= "<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosespasien->getNik($i) . "</td>
                <td>" . $this->prosespasien->getNama($i) . "</td>
                <td>" . $this->prosespasien->getTempat($i) . "</td>
                <td>" . $this->prosespasien->getTl($i) . "</td>
                <td>" . $this->prosespasien->getGender($i) . "</td>
                <td>" . $this->prosespasien->getEmail($i) . "</td>
                <td>" . $this->prosespasien->getTelp($i) . "</td>
                <td style='font-size: 22px;'>
                    <a href='editForm.php?id=" . $this->prosespasien->getId($i) . "' class='btn btn-warning' role='button'>Edit</a>&nbsp;
                    <a href='index.php?hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' role='button'>Hapus</a>
                </td>
            </tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

}
