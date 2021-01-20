<?php 
// print_r($_SERVER);
// die();
// load terlebih dahulu configurasi database dan autoloading
include_once("library/config/config.php");
// ambil controller, action dan id 
$controller = isset($_GET['controller'])?$_GET['controller']:'Site';
$action 	= isset($_GET['action'])?$_GET['action']:'';
$id 		= isset($_GET['id'])?$_GET['id']:'';

// kalau sudah, silahkan load 
// bila controller tidak kosong, maka:
if($controller!=''){
	$controller = 'Controller'.$controller;
	// $test = new $controller();
	ob_start();
	ob_implicit_flush(false);
	$test = new $controller();
	// simpan capture ke variabel content 
	$content =  ob_get_clean();
	// load index.php template, 
	// letakkan content di dalam index.php 
	include('template/metro/'.$test->layout_file);
}
?>