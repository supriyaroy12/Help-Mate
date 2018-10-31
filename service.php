<?php

  session_start();
  if(!isset($_SESSION['username'])){
    header('Location:admin.php');
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

  if(isset($_POST["fname"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $sname = $_POST["sname"];
    $add = $_POST["address"];
    $con = $_POST["contact"];
    $loca = $_POST["loca"];
    $serve = $_POST["serve"];

    $sql = "INSERT into professionals(owner_fname,owner_lname,shop_name,address,location,service,contact) VALUES('".$fname."','". $lname."','". $sname."','". $add."','". $loca."','". $serve."',". $con.");";
    mysqli_query($conn,$sql);

    //echo '<script language="javascript">';
    //echo 'alert("ENTRY HAS BEEN ADDED.");';
    //echo '</script>';
    header('Location:service_msg.php');

  }


  $conn->close();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="service.css">
    <link rel="text/javascript" href="service.js">
    <meta name="viewport" content="width=device-width, inital-scale=1">
</head>
<body>
    <legend><p id="para">SERVICE PROVIDER INFORMATION</p></legend>
    <div class="form">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="firstname">
              FIRST NAME : <input id="f" type="text"  name="fname" required placeholder="Enter First name">
          </div>
          <div class="lastname">
              LAST NAME : <input id="l" type="text" name="lname" required placeholder="Enter Last name">
          </div>
          <div class="shopname">
              SHOP NAME : <input id="s" type="text" name="sname" required  placeholder="Enter your shop's name">
          </div>
          <div class="add">
              ADDRESS : <input id="a" type="text" name="address" required placeholder="Enter Shop's address">
          </div>
          <div class="phno">
              CONTACT : <input id="c" name="contact" type="tel" required placeholder="Enter your contact no.">
          </div>
          <div class="location">
              LOCATION :
              <select id="loc" name="loca" required>
                <option>CHOOSE A LOCATION</option>
                <option value="mumbai">MUMBAI</option>
                <option value="pune">PUNE</option>
                <option value="navi mumbai">NAVI MUMBAI</option>
              </select>
          </div>
          <div class="service">
              SERVICE :
              <select id="ser" name="serve" required>
                <option >CHOOSE A SERVICE</option>
                <option value="home cleaning">HOME CLEANING</option>
                <option value="appliance repair">APPLIANCE REPAIR</option>
                <option value="beauty and spa">BEAUTY AND SPA</option>
                <option value="health and wellness">HEALTH AND WELLNESS</option>
                <option value="bussiness and taxes">BUSSINESS AND TAXES</option>
              </select>
          </div>
          <div class="submit">
              <input id="sub" type="submit" value="SUBMIT" style="border-width:thin">
          </div>
        </form>
    </div>
</body>
</html>
