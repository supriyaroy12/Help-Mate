<?php
session_start();
if(!isset($_SESSION['username'])){
  include 'admin.php';
  echo '<script language="javascript">';
  echo 'alert("OOPS! YOU ARE NOT THE ADMIN.");';
  echo '</script>';

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

  if(isset($_POST["lname"])){
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];

    $sql = "DELETE FROM professionals WHERE owner_lname='".$lname."' and owner_fname='".$fname."' and shop_name='".$sname."';";
    $conn->query($sql);
    //echo '<script language="javascript">';
  //  echo 'alert("RECORD HAS BEEN DELETED.");';
    //echo '</script>';
    header('Location:delete_msg.php');
  }

  $conn->close();
?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="delete.css">
  <meta name="viewport" content="width=device-width, inital-scale=1">
</head>
<body>
    <form method="post" class="delete" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="txt">
        Enter Following Details Of The Record To Be Deleted:
      </div>
      <div class="first">
          First name: <input required id="f" type="text" name="fname" placeholder="Enter First Name"><br>
      </div>
      <div class="last">
          Last name: <input required id="l" type="text" name="lname"placeholder="Enter Last Name"><br>
      </div>
      <div class="shop">
          Shop name: <input required id="s" type="text" name="sname" placeholder="Enter Shop Name"><br>
      </div>
      <div class="sub">
          <input id="su" type="submit" value="DELETE">
      </div>
    </form>
</body>
</html>
