
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$country = $_POST['country'];
$city = $_POST['city'];
$package = $_POST['package'];
$service = $_POST['service'];
$budget = $_POST['budget'];
$information = $_POST['information'];
$images = $_POST['images'];
$odate = $_POST['odate'];
$ddate = $_POST['ddate'];

$dbconnect = mysqli_connect('localhost','root','','formdata');

$sql =mysqli_query($dbconnect, "insert into sformdata(id,name,email,number,country,city,package,service,budget,information,images,odate,ddate) 
value('','$name','$email','$number','$country','$city','$package','$service','$budget','$information','$images','$odate','$ddate')");

if($sql){
    echo "Data sucessefully inserted.";
}else{
    echo "Faild to inserted";
}


header("refresh:0; url=form.html");



?>