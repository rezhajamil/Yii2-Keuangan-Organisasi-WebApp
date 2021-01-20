<?php

class model{
  private $_din;
  private $_id;
  private $_isfetch=false;
  public $_conn;
  
  public $tablename;
  private $config;
  public $pk;
  
  public function __construct($conn=null) {
       $this->config=$GLOBALS[$this->connection()]; 
     if(isset($conn)){
    $this->_conn =$conn;
     }
     else{  
    $this->_conn =new mysqli($this->config['host'],
                $this->config['user'],
                $this->config['pass'],
                $this->config['db']);
     }
       $a = $this->attributes();
       foreach($a as $c=>$k){
        $this->_din[$k] ='' ;
    if($c==='id'){
      $this->_id=$k;
      $this->pk =$k;
    }
        }
  }
  
  public function __get($name) {
    if(isset( $this->_din[$name]))
        return $this->_din[$name];
    elseif ($name=='_attributes')
    {
        foreach($this->attributes() as $c=>$k){$a[$k]=$this->_din[$k];}
        return $a;
    }
    else
        return '';
  }
  
  public function __set($name, $value) {
    if(isset( $this->_din[$name]))
        $this->_din[$name] = $value;
    elseif($name=='_attributes'){
        foreach($this->attributes() as $c=>$k){
      if(isset($value[$k])){$this->_din[$k]=$value[$k];}}
    }
  }  
  public function attributes() {
    return array();
  }
  public function connection() {
    return '';
  }
  
  public function query($sql){
    return $this->_conn->query($sql);
  }
  
  public function save($where=''){
    $str ="";    
    if($this->_isfetch){
    if($where==''){
      $where = "WHERE ".$this->_id."='".$this->_din[$this->_id]."'";
    }
        $str = " UPDATE ".$this->tablename." SET ";
        $ks= array();
        foreach($this->_din as $k=>$v){
            $ks[] =$k."='".$v."'";
        }
        $str .=join(',',$ks).$where;
    }
    else{
        $str = " INSERT INTO ".$this->tablename." SET ";
        $ks= array();
        foreach($this->_din as $k=>$v){
      if($this->_id ==$k && $v=='')
        continue;
            $ks[] =$k."='".$v."'";
        }
        $str .= join(',',$ks);
    //echo $str;die();
    }
    $result = $this->query($str);
    if (!$result) {
    die('Invalid query: ' . $this->_conn->error);
    }
    else{
    if(!$this->_isfetch){
      $this->_din[$this->_id]=$this->_conn->insert_id;
      $this->load();
    }
    
        return true;
    }
  }
  
  public function delete($where=''){
    
    if($where =='' && $this->_isfetch){
        
        $ks= array();
        foreach($this->_din as $k=>$v){
            if($v!='')
                $ks[] =$k."='".$v."'";
        }
        $where = 'WHERE '.join(' AND ',$ks);
    }
    $str =" Delete From ".$this->tablename." ".$where;
    
    //echo $str;die();
    $result = $this->query($str);
    if (!$result) {
        die('Invalid query: ' . $this->_conn->error);
    //$result->free();
    }
    else{
    //$result->free();
        return true;
    }
  }
  public function load($sql='',$where=''){
  
  if($where=='' && $this->_din[$this->_id]!=''){
    $where = "WHERE ".$this->_id."='".$this->_din[$this->_id]."'";
  }
    if(!isset($sql) || $sql==''){
        $sql="SELECT * FROM ".$this->tablename." ".$where." LIMIT 1";           
    }    
    //echo $sql;die();
    $result = $this->query($sql);
    if (!$result) {
        die('Invalid query: ' . $this->_conn->error);
    }
    else{
        $this->_isfetch=true;
        
        while ($row = $result->fetch_assoc())  {
            foreach($row as $k=>$v){
                $this->$k=$v;
            }
        }
        //print_r($this);
        
        // Free the resources associated with the result set
        // This is done automatically at the end of the script
        $result->free();
    return $this;
    }
  } 
  
  public static function loads($sql='',$where=''){
    $ret=null;
    $classname = get_called_class();
    $c = new $classname;
    if(!isset($sql)||$sql==''){
        $sql="SELECT * FROM ".$c->tablename." ".$where;
    }      
    
    $result = $c->query($sql);
    if (!$result) {
        die('Invalid query: ' . $this->_conn->error);
    }
    else{
        $t=0;
        while ($row = $result->fetch_assoc())  {
            $ret[$t]= new $classname($c->_conn);
            foreach($row as $k=>$v){
                $ret[$t]->$k=$v;
            }
      $ret[$t]->_isfetch=true;
            $t++;
        }
        
        // Free the resources associated with the result set
        // This is done automatically at the end of the script
        $result->free();
    }
    return $ret;
  } 
}

?>