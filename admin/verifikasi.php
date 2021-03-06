<?php

session_start();

require_once("../functions.php");
require_once("../model/model_pt.php");
require_once("../model/model_jurusan.php");
require_once("../model/model_tempat.php");
require_once("../model/model_user.php");

	if(!isset($_SESSION['username']) || $_SESSION['user_status']!=1){
		die(header("location: ".base_url()."/404.php"));
	}

	$id = $_GET['id'];
	$data = $pt->get_detail($id);

	$tgl = date("Y-m-d");
	$user->notif_add("<span class=text-success><b>Admin</b> telah menerima usulan tambahan data anda !!</a> <a href=".base_url()."/detail.php?id=$id target=blank class=text-warning>lihat?</a>",$data->publish_status,$tgl);

	$verif = $pt->verifikasi($id);

	header("location: ".base_url()."/admin/usulan");


?>