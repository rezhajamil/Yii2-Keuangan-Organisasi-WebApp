<?php 

class Transaksi extends model{ 
  
  public $tablename = "transaksi";
  public function connection() {
    return 'conf'; 
  }
  
  public function attributes() {
    return array(
		'id'=>'id_transaksi', 
		'tgl_transaksi', 
		'pemberi', 
		'penerima', 
		'jumlah', 
	);
  }  
}
?>