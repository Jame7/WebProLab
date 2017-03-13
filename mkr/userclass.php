<?php
	class user Extends db{
		private $id;
		public $user_name;
		public $user_email;
		//public $answer;
		//public $id_student;
		/*
		function set_id($id){
			$this->id = $id;
		}
		*/
		function insert(){
			$sql = "INSERT INTO user(user_name,user_email)
			VALUES('" 
			. $this->user_name . "','"
			. $this->user_email . "')";
			/*
			$sql = "INSERT INTO faq(question,answer,id_student) 
			VALUES('" 
			. $this->question . "','" 
			. $this->answer . "','"
			. $this->id_student . "')";
			*/
			if(mysqli_query($this->link,$sql)){
				//echo "Insert data to chat successfully";
				return true;
			}else{
				//echo "Can't insert data to chat";
				return false;
			}
		}
		/*
		function update($id){
			$sql = "UPDATE faq SET question ='"
			.$this->question ."',answer ='"
			.$this->answer ."' WHERE id=" .$id;
			if(mysqli_query($this->link,$sql)){
				echo "Update faq sucessfully";
				return true;
			}else{
				echo "Can't update faq";
				return false;
			}
		}
		*/
		function delete (){
            $sql = "DELETE * FROM user";

            if (mysqli_query($this->link,$sql)){
				echo " Record delete from chat";
				return true;
			}else{
				echo " Can't delete record".$this->id;
				return false;
			}
		}
		
	}



?>