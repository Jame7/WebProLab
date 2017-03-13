<?php
include("db.php");
include("userclass.php");
    session_start();
    if(isset($_POST['insert'])){
        //echo "insertdasd";
        $user = new user();
        $user->connect();
        $user->user_name = $_POST['user_name'];
        $user->user_email = $_POST['user_email'];
        $_SESSION['user_name'] = $_POST['user_name']; 
        $user->insert();
        echo"<meta http-equiv='refresh' content=\"1;URL='chat.html'\">";
    }
    if(isset($_SESSION['user_name'])){
        //echo $_SESSION['user_name'];


//<!DOCTYPE html>

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$a = $_SESSION['user_name'];

$conn = mysqli_connect("localhost","it58660136","RAHE#9378","it58660136");
//$conn = mysql_set_charset("utf8");
$result = $conn->query("SELECT * FROM  user where user_name != '$a' ");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {
        $outp .= ",";
    }
    
    $outp .= '{"ID":"'  . $rs["user_id"] . '",';
    $outp .= '"Name":"'   . $rs["user_name"]        . '",';
    $outp .= '"Email":"'. $rs["user_email"]     . '"}'; 
    

}
$outp .="]";

//echo "<br>";

$results = $conn->query("SELECT * FROM  chat");
$output = "[";
/*while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $output .= '{"ID":"'  . $rs["user_Id"] . '",';
    $output .= '"Name":"'   . $rs["user_name"]        . '",';
    $output .= '"Email":"'. $rs["user_email"]     . '"}'; 
}*/
$output .="]";

echo($outp);
$conn->close();


//echo($output);
}
?>
