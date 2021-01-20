<?php  
class Controller{

	protected $_url;
	protected $_pk;
	protected $_model;
	protected $_action;
	public $layout_file='index.php';
	
	public function __construct($url='',$model='',$pk='') {
		$this->_model	=($model!=''?$model:$this->_model);
		$this->_pk		=($pk!=''?$pk:$this->_pk);
		$this->_url		=($url!=''?$url:$this->_url);
		$this->_action();
	}

	public function getControllerName(){
		$ctrl = get_class($this);
		$ctrl = substr($ctrl,10);
		return $ctrl;
	}

	protected function hakAkses(){
		return array();
		
		/*ini sebagai komentar, bila akan menyusun
		array */
		/*return array(
			array(
				'action'=>'index',
				'access'=>'*'
			),
			array(
				'action'=>'create',
				'access'=>'@'
			),
			array(
				'action'=>'update',
				'access'=>'@'
			),
			array(
				'action'=>'view',
				'access'=>'*'
			),
			array(
				'action'=>'delete',
				'access'=>'@'
			)
		);*/
		
	}
	protected function _action(){
		// mulailah session jika belum ada
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// ambil action, jika tidak diisi, arahkan ke index
		$action = isset($_GET['action'])?$_GET['action']:'index';
		// dari pada pakai action, kita pakai methode saja
		// cek apakah class ini ada action yang dipanggil 
		// dengan fungsi: method_exists
		// ambil hak akses 
		$hakAkses = $this->hakAkses();
		// kalau harus login 
		$haruslogin = false;
		$bolehAkses=empty($hakAkses);
		if(method_exists($this,$action)){
			// kalau ada action, simpan action, panggil action
			//ambil group session jika ada 
			$group = isset($_SESSION['group'])?$_SESSION['group']:'';
			foreach($hakAkses as $k){
				// cek apakah action ada di dalam string ini?
				if(stripos($k['action'],$action)!==false){
					// bila ada, cek hak access-nya
					if($k['access']=='*'){
						// hak akses semua, silahkan masuk
						$bolehAkses=true;
						break;
					}
					if(!$haruslogin){
						$haruslogin = $k['access']!='*';
					}
					if($group!=''){
						// user login 
						if(
							$k['access']=='@' ||
							stripos($k['access'],$group)!==false
						){
							// hak akses hanya login, 
							// atau ada group nya silahkan masuk
							$bolehAkses=true;
							break;
						}
					}
				}
			}
		}
		if($bolehAkses){			
			$this->_action = $action;
			$this->$action();
		}
		else{
			if($haruslogin){
				echo 'Anda harus login';
			}
			else 
				echo 'Akses tidak ditemukan';
		}
	}
	
	// dapat ditimpa/override 
	// digunakan untuk mengambil data
	protected function _load(){
		$id = isset($_GET['id'])?$_GET['id']:'';
		if($id==''){ 							// kalau tidak ada ID yang mau dihapus 
			echo 'Tidak ada Barang yang akan di-'.$this->_action; // tampilkan pesan
			return;
		}
		// simpan ke sebuah variabel nama primary keynya
		$pk = $this->_pk;
		// load object model 
		$objModel = new $this->_model();
		$objModel->$pk=$id;
		$objModel->load();
		return $objModel;
	}
	
	// dapat ditulis ulang untuk menampilkan tabel
	// data dalam bentuk object 
	// field_label dalam bentuk array dengan index adalah attribute
	// 										 value adalah labelnya
	protected function table($data,$field_label){
		// simpan ke sebuah variabel nama primary keynya
		$pk = $this->_pk;
		
		// buat tabel dan header dulu
		echo  '<div class="row" id="table"><div class="cell-12"><table class="table striped table-border mt-4"
				   data-role="table"
				   data-rows="10"
				   data-rows-steps="5, 10"
				   data-rownum="true">
				<thead>
					<tr>';
		
		foreach($field_label as $nama_field=>$label){
			echo '
						<th>'.$label.'</th>';
		}
		echo '		<th>Aksi</th>
					</tr>
				</thead>
				<tbody>';
		// buat data 
		if(count($data)){
			foreach($data as $k=>$y){
				echo '<tr>';
				// echo 	 '<td>'.($k+1).'</td>';
				foreach($field_label as $nama_field=>$label){
					echo '<td>'.$y->$nama_field.'</td>';
				}
				echo '<td>'
						.'<a class="button primary" href="'.$this->createUrl('view').'&id='.$y->$pk.'">View</a>'
						.'&nbsp;&nbsp;'
						.'<a class="button primary" href="'.$this->createUrl('update').'&id='.$y->$pk.'">Update</a>'
						.'&nbsp;&nbsp;'
						.'<a class="button primary" href="'.$this->createUrl('delete').'&id='.$y->$pk.'">Delete</a>'
					.'</td>';
				echo '</tr>';
			}
			echo  '</table>';
			}
		}
	
	
	// dapat ditulis ulang untuk menampilkan url
	// kalau label diisi, akan muncul a 
	// kalau tidak hanya urlnya 
	public function createUrl($action='index',$label=''){
		// susun urlnya
		$url = $this->_url.'?action='.$action;
		// kalau ada label yang mau dimasukkan, 
		// berarti harus buat a 
		if($label!=''){
			return '<a href="'.$url.'" style="display:block" class="button primary">'.$label.'</a>';
		}
		return $url;
	}

	public function createLink($label,$url,$get=array()){
		$url = $this->createUrl($url,$get);
		return '<a href="'.$url.'">'.$label.'</a>';
	}
	// dapat ditimpa/override
	// menghapus data 
	public function delete(){
		$this->_load()->delete();	// load model & hapus data
		header("Location:".$this->createUrl('index'));
	}	

	// harus ditimpa/override
	// menampilkan data, harap buat tampilan HTMLnya 
	public function view(){
		$data = $this->_load();		// load model
		
		// tampilkan view disini
		
		/* Siapkan jalan kembali */ 
		echo $this->createUrl('index','Kembali'); 
	}	
	
	// harus ditimpa/override
	// menampilkan form create dan simpan, harap buat tampilan HTMLnya 
	public function create(){
		/* 
			kalau ada post, tetapi tidak berhasil simpan, maka 		
			cek apakah $this->_model sama dengan di $_POST
			karena indexnya case sensitive
		*/
		if(isset($_POST[$this->_model])){					// kalau ada post
			$objModel = new $this->_model();				// buat var tipe 
			$objModel->_attributes=$_POST[$this->_model];  	// ambil datanya
			$objModel->save();								// simpan
			// arahkan kembali ke index
			header("Location:".$this->createUrl('index'));				
		}
		else{
			// kalau tidak ada post, maka user baru klik create
			// tampilkan form disini
			
			/* Siapkan jalan kembali */ 
			echo $this->createUrl('index','Kembali'); 
		}
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
		}
		else{
			// kalau tidak ada post, maka user baru klik update 
			// tampilkan form disini
			
			/* Siapkan jalan kembali */ 
			echo $this->createUrl('index','Kembali');  
		}		
	}

	// dapat ditimpa/override
	// menampilkan tabel tidak perlu ditimpa, boleh default
	public function index(){
		// tampilkan tombol tambah
		$this->layout_file='index.php';
		echo $this->createUrl('create','Input '.$this->_model);						
		// load data;
		//echo $this->_model;
		$test = $this->_model;
		$data = $test::loads();
		// susun dalam tabel 
		$this->table($data,array(
			'tgl_transaksi'=>'Tanggal Transaksi',
			'pemberi'=>'Pemberi',
			'jumlah'=>'Jumlah Transaksi (Rupiah)',
		));
	}
	
	public function render($_viewFile_,$_data_=null,$_return_=false)
	{
		// Kita mengekstrak data array('nama'=>'value',...) 
		// menjadi $nama='value'
		if(is_array($_data_))
			extract($_data_,EXTR_PREFIX_SAME,'data');
		else
			$data=$_data_;
		// load nama controller, ambil namanya
		$ctrl = get_class($this);
		$ctrl = substr($ctrl,10);
		// susun urlnya
		// cek ada '/' apa tidak, kalau tidak, tambahkan ctrl
		if(strpos($_viewFile_,'/')===false){
			// lokasi file adalah di folder library/view/controllernya
			// diikuti oleh nama filenya
			$_viewFile_ = 'library/view/'.$ctrl.'/'.$_viewFile_;			
		}
		
		if($_return_)
		{
			ob_start();
			ob_implicit_flush(false);
			require($_viewFile_);
			return ob_get_clean();
		}
		else
			require($_viewFile_);
	}
	
}
?>