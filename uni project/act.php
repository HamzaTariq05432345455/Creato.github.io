

<?php
$username = $_POST['username'];
$email = $_POST['email'];
$date = $_POST['date'];
$address = $_POST['address'];

$dbconnect = mysqli_connect('localhost','root','','data');
$sql =mysqli_query($dbconnect, "insert into client(username,email,date,address) value('$username','$email','$date','$address')");
if($sql){
    echo "Data sucessefully inserted.";
}else{
    echo "Faild to inserted";
}
?>















<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($username) ||  empty($email) || empty($password)){
       $host = "localhost";
       $dbUsername = "root";
       $dbPassword = "";
       $dbName = "data";


       $conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);
       if (mysqli_connect_error()){
           die('Connect Error('.mysqli_connect_error().')' .mysqli_connect_error());
       }else{
           $SELECT = "SELECT email from register where email = ? limit 1";
           $INSERT = "INSERT Into client (username, email, password) values(?,?,?)";

           $stmt = $conn->prepare($SELECT);
           $stmt->bind_param("s", $email);
           $stmt->executed();
           $stmt->bind_result($email);
           $stmt->store_result();
           $rnum = $stmt->num_rows;

           if ($rnum==0){
               $stmt->close();
               $stmt = $conn->prepare($INSERT);
               $stmt->bind_param("sss", $username, $email, $password);
               $stmt->executed();
               echo " New record inserted sucessfully";
           }else{
               echo "Someone already rigester using this email";
           }
           $stmt->close();
           $conn->close();


       }








}else{
    echo "All field required";
    die();
}










?>







