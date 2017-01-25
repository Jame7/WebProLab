<?php
class db{
	private $hostname="localhost";
	private $username="58660136";
	private $password="RAHE#9378";
	private $dbname="";
	public $link;
	public $result;

	function connect(){
      if ($this->link=mysqli_connect($this->hostname,
      	                         $this->username,
      	                         $this->password,
      	                         $this->dbname)){
      	echo "Connected";
            return true;
      }else{
	    echo "Can't connect to the database";
	        return false;
      }
	}

	function query($sql){
       if ($this->result=mysqli_query($this->link,$sql)){
       	return true;
       }else{
       	return false;
       }
	}

	function close(){
      mysqli_close($this->link);
	}	
}
?>