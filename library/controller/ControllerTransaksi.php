<?php 

class ControllerTransaksi extends Controller{	
	// tidak semua attribute dideklarasi ulang
	protected $_pk  = 'id_transaksi';
	protected $_model = 'Transaksi';
	
	// tidak semua metode dideklarasi ulang
	protected function hakAkses(){
		return array(
			array(
				'action'=>'index,view',
				'access'=>'*'
			),			
			array(
				'action'=>'update,create,delete',
				'access'=>'@'
			)
		);
	}
	// harus ditimpa/override
	// menampilkan data, harap buat tampilan HTMLnya 
	public function view(){
		$objModel = $this->_load();		// load model		
		// tampilkan view disini
		$this->render('view.php',array('objModel'=>$objModel));
	}
	// harus ditimpa/override
	// menampilkan form create dan simpan, harap buat tampilan HTMLnya 
	public function create(){
		/* 
			kalau ada post, tetapi tidak berhasil simpan, maka 		
			cek apakah $this->_model sama dengan di $_POST
			karena indexnya case sensitive
		*/
		$objModel = new $this->_model();
		if(isset($_POST[$this->_model])){					// kalau ada post
							// buat var tipe 
			$objModel->_attributes=$_POST[$this->_model];  	// ambil datanya
			$objModel->save();								// simpan
			// arahkan kembali ke index
			header("Location:".$this->createUrl('index'));				
		}
		$this->render('_form.php',array('objModel'=>$objModel));
		
		}
		

	// harus ditimpa/override
	// menampilkan form update dan simpan, harap buat tampilan HTMLnya
	public function update(){
		$objModel = $this->_load();							// load model 
		/* 
			kalau ada post, tetapi tidak berhasil simpan, maka 		
			cek apakah $this->_model sama dengan di $_POST
			karena indexnya case sensitive
		*/
		if(isset($_POST[$this->_model])){					// kalau ada post
			$objModel->_attributes=$_POST[$this->_model];  	// ambil datanya
			$objModel->save();								// simpan
			// arahkan kembali ke index
			header("Location:".$this->createUrl('index'));
			return;				
		}
		$this->render('_form.php',array('objModel'=>$objModel));
		}		
	}

?>