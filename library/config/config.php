<?php 
	$conf=array(
		'host'=>'localhost',
		'user'=>'root',
		'pass'=>'',
		'db'=>'projek'
	);

	// menggunakan autoload
	// memudahkan tidak perlu pakai include
	// syaratnya, nama class sama dengan nama file 
	spl_autoload_register(function ($class_name) {
		// tentukan filename nya, diakhiri dengan php 
		$files = $class_name . '.php';
		//folder yang berisi class 
		$folder = array('model','controller','class');
		// loop
		foreach($folder as $d){
			$filename = 'library/'.$d.'/'.$files;
			if(is_file($filename)){
				//echo $filename.'<br/>';
				require_once($filename);
				return;
			}
	}
die('file '.$files.' tidak ditemukan');
	return;
});

	function baseUrl(){
	// ambil servername: $_SERVER['REQUEST_SCHEME'] -> http/https
	// ambil servername: $_SERVER['SERVER_NAME'] -> localhost
	// ambil servername: $_SERVER['PHP_SELF'] -> lokasi urlnya, hapus index.php, gabungkan 
	return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,-9);
}

$autoload['helper'] = array('url');
 ?>