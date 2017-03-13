<?php
	function set_id($id){
			$this->id = $id;
	}
	session_start();
	$conn = mysqli_connect("localhost","it58660136","RAHE#9378","it58660136");

	$sql = "DELETE FROM user WHERE user_id >=1 and user_id<= 265 ";
	if (mysqli_query($conn, $sql)) {
	    //echo "Record deleted successfully";
	} else {
	    //echo "Error deleting record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	session_destroy();
	echo"<meta http-equiv='refresh' content=\"0;URL='index.php'\">";

?>