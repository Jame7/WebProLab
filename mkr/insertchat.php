<?php
include("db.php");
include("chatclass.php");
	session_start();
	if(isset($_POST['detail'])){
		//echo "insert";
		$chat = new chat();
		$chat->connect();
		$chat->user_name = $_SESSION['user_name'];
		$chat->chat_text = $_POST['detail'];
		$chat->char_date = date("Y-m-d H:i:s");
		$chat->insert();
		//echo"<meta http-equiv='refresh' content=\"1;URL='chat.html'\">";
		echo "true";
	}if(isset($_SESSION['user_name'])){
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		$conn = mysqli_connect("localhost","it58660136","RAHE#9378","it58660136");
		$result = $conn->query("SELECT * FROM  chat");
		$output = "[";
		while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		    if ($output != "[") {
		        $output .= ",";
		    }
		    
		    $output .= '{"ID":"'  . $rs["chat_Id"] . '",';
		    $output .= '"Name":"'   . $rs["user_name"]        . '",';
		    $output .= '"Text":"'   . $rs["chat_text"]        . '",';
		    $output .= '"Time":"'. $rs["char_date"]     . '"}';
		}
			$output .="]";
			echo($output);
			$conn->close();
	}
	/*
	echo "<table border=1>";
    foreach ($_POST as $key => $value) {
        echo "<tr><td>_POST[{$key}];</td><td>{$value}</td></tr>";
        //echo "$key=$value";
    }
    echo "</table>";
    */
?>