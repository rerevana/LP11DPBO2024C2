<?php

interface KontrakView{
	public function tampil();
}

interface KontrakData{
	// public function edit();
	public function tambah();
}

interface KontrakData1{
	public function edit($id);
	// public function tambah();
}

?>