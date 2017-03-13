<?php
	session_start();
	$a = $_SESSION['user_name'];
	//echo $a;
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type='text/css' href='mystyle.css'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		body {
			font: 400 15px Lato, sans-serif;
		    line-height: 1.8;
		    color: #fff;
		    background: #2d2d30;
		}
		counttext{
			color: #000;
		}
  	</style>
</head>
<body>
	<div class="jum text-center">
  		<h1>REALTIME CHAT</h1> 
  		<p>WELCOME</p> 
	</div>
	<h4 class="text-center">CHAT ROOM</h4>

	<div id = 'back'>
		<div id ='chat'>
			<p align="center">Chat</p>
			<div id="mydivc">Loading chat please wait.....</div>
		</div>
		<div id = 'listname'>
			<p align="center">ListName</p>
			<p align="center">*<?php echo $a ?>*</p>
			<div id="mydivs" align="center"></div>
		</div>

		<div id = 'lchat'>
			<div id = 'backsend'>
			<input type='text' name='detail' id='detail' onkeyup="count()" maxlength="100">
			<sub id='counttext' color='#ffffff'>คำ : 100 ตัวอักษร</sub><br>
			</div>
		</div>
		<div id = 'rlistname'>
			<button type='button' id="send" onclick="send()" class="btn btn-primary">send</button>
        
        	<a href='quit.php'>
        	<button type='button' name="quit" class="btn btn-primary">quit</button></a><br>
		</div>
        
    </div>
    <script>

		function count() {
                var i = document.getElementById('detail').value.length;
                document.getElementById('counttext').innerHTML = "คำ : " + (100 - i)+ " ตัวอักษร";
        }
		function send() {
			var txt = "";
            txt += document.getElementById('detail').value;
            document.getElementById('detail').value="";
            insertData(txt);
             document.getElementById('counttxt').innerHTML = "คำ : 100";

		}
		function insertData(argument) {
			var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('gg').innerHTML=ajax.responseText;
                    }
                }
                ajax.open('POST', 'insertchat.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.send("name=<?php echo $_SESSION['user_name']; ?>&email=<?php $_SESSION['email'] ?>&detail=" + argument);

		}
		
		function loadXMLDoc() {
			var xmlhttp;
				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange=function() {
				//alert(xmlhttp.readyState +" : "+xmlhttp.status);
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","chat.php",true);
			xmlhttp.send();
		}
		function loadjson(){
		   var xmlhttp;
		   xmlhttp = new XMLHttpRequest;
		   xmlhttp.onreadystatechange = function(){
		      if (xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
		         var html = "";
		         var obj = JSON.parse(xmlhttp.responseText);
		         //alert(obj.books.length);
		         for (i in obj){
		         	//document.wirite(obj);
		            html += obj[i].Name + "<br>";
		            //html += "<img src='" + obj.books[i].book.cover + "' height='100'><hr>"; 
		            
		         }
		        document.getElementById("mydivs").innerHTML = html;
		      }
		   }
		   xmlhttp.open("POST", "chat.php", true);
		   xmlhttp.send();
		}
		setInterval(loadjson,2000);

		function loadjsonchat(){
		   var xmlhttp;
		   xmlhttp = new XMLHttpRequest;
		   xmlhttp.onreadystatechange = function(){
		      if (xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
		         var html = "";
		         var obj = JSON.parse(xmlhttp.responseText);
		         //alert(obj.books.length);
		         for (i in obj){
		         	//document.wirite(obj);
		         	html += " User ";
		            html += obj[i].Name + " : ";
		            html += obj[i].Text + " [";
		            html += obj[i].Time + "]<br><br>";
		            //html += "<img src='" + obj.books[i].book.cover + "' height='100'><hr>"; 
		            
		         }
		        document.getElementById("mydivc").innerHTML = html;
		        //autoscroll();
		      }
		   }
		   xmlhttp.open("POST", "insertchat.php", true);
		   xmlhttp.send();
		}
		setInterval(loadjsonchat,2000);
	</script>
</body>
</html>