<?php
	class chat Extends db{
		private $id;
		public $user_name;
		public $chat_text;
		public $char_date;
		//public $answer;
		//public $id_student;
		/*
		function set_id($id){
			$this->id = $id;
		}
		*/
		function insert(){
			$sql = "INSERT INTO chat(user_name,chat_text,char_date)
			VALUES('" 
			. $this->user_name . "','"
			. $this->chat_text . "','"
			. $this->char_date . "')";
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
            $sql = "DELETE FROM miniproject WHERE id=".$this->id;

            if (mysqli_query($this->link,$sql)){
				echo " Record".$this->id."delete from faq";
				return true;
			}else{
				echo " Can't delete record".$this->id;
				return false;
			}
		}
		
	}



?>