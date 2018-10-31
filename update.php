<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location:admin.php');
  //echo '<script language="javascript">';
  //echo 'alert("OOPS! YOU ARE NOT THE ADMIN.");';
  //echo '</script>';

  exit();
}

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "service_provider";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
  die("Connection Failed : ". $conn->connect_error);
}
if(isset($_POST['lname'])){

  $lname = $_POST["lname"];
  $fname = $_POST["fname"];
  $sname = $_POST["sname"];
  $feild = $_POST["feild"];
  $detail = $_POST["detail"];

   $sql = "UPDATE professionals SET ".$feild." = '".$detail."' WHERE owner_lname='".$lname."' and owner_fname='".$fname."' and shop_name='".$sname."';";
      mysqli_query($conn,$sql);
    //  echo '<script language="javascript">';
      //echo 'alert("RECORD HAS BEEN UPDATED.");';
      //echo '</script>';

      header('Location:update_msg.php');
}
  $conn->close();
?>


<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="update.css">
  <meta name="viewport" content="width=device-width, inital-scale=1">
  <script type="text/javascript" src="update.js"></script>
</head>
<body>
  <form  method="post" class="update" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="txt">
      Enter Following Details Of The Record To Be Updated :
    </div>
    <div class="first">
      First name: <input required  id="f" type="text" name="fname" placeholder="Enter First Name"><br>
    </div>
    <div class="last">
      Last name: <input required id="l" type="text" name="lname"placeholder="Enter Last Name"><br>
    </div>
    <div class="shop">
      Shop name: <input required id="s" type="text" name="sname" placeholder="Enter Shop Name"><br>
    </div>
    <div class="upd">
      Enter Feild To Be Updated :
      <select id="upda" name="feild" required>
        <option value="#">CHOOSE FEILD</option>
        <option value="owner_fname">OWNER FIRST NAME</option>
        <option value="owner_lname">OWNER LAST NAME</option>
        <option value="shop_name">SHOP NAME</option>
        <option value="address">ADDRESS</option>
        <option value="location">LOCATION</option>
        <option value="service">SERVICE</option>
        <option value="contact">CONTACT</option>
      </select>
      <input required id="new" name="detail" type="text" placeholder="Enter New Detail">
    </div>
    <div class="sub">
      <input id="su" type="submit" value="UPDATE">
    </div>
  </form>
</body>
</html>
