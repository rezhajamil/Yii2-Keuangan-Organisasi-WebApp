<?php 

class ControllerSite extends Controller{	
	// tidak semua attribute dideklarasi ulang
	protected $_pk  = 'userId';
	protected $_model = 'User';
	
	// tidak semua metode dideklarasi ulang
	
	public function index(){
		$this->layout_file = 'welcome.php';
	}
	
	public function login(){
		if(isset($_POST['Login'])){					// kalau ada post
			// cek user:demo dan pass:demo
			// mengambil adata dari DB
			$data= new User();
			// disini digunakan bila kita mengetahui 1 data dari field non PK
			$data->load('','WHERE userId="'.$_POST['Login']['username'].'"');
			// disini digunakan bila kita mengetahui 1 data dari field  PK
			// $data->userId=$_POST['Login']['username'];
			// $data->load();

			if($_POST['Login']['username']==$data->userId 
				&& $_POST['Login']['password']==$data->userPassword){
				$_SESSION['id']  =$data->userId;
				$_SESSION['name']=$data->userNama;
				$_SESSION['group']=$data->userGroup;
			}
			header("Location:".$this->createUrl('index'));
			return;			
		}
		$this->render('login.php');
	}

	public function logout(){
		session_destroy();
		header("Location:".$this->createUrl('index'));
	}

	public function create(){
		/* 
			kalau ada post, tetapi tidak berhasil simpan, maka 		
			cek apakah $this->_model sama dengan di $_POST
			karena indexnya case sensitive
		*/
		$objModel=new User();
		$objModel = new $this->_model;
		if(isset($_POST[$this->_model])){					// kalau ada post
							// buat var tipe 
			$objModel->_attributes=$_POST[$this->_model];  	// ambil datanya
			$objModel->save();								// simpan
			// arahkan kembali ke index
			header("Location:".$this->createUrl('index'));				
		}
		$this->render('signup2.php',array('objModel'=>$objModel));
		
		}
			
}
?>