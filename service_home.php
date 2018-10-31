<?php
    if(isset($_POST["loca"])){
      $loca = $_POST["loca"];
      $serve = $_POST["serve"];
    }


    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "service_provider";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
      die("Connection Failed : ". $conn->connect_error);
    }
    if(isset($loca)){
       $sql = "SELECT owner_fname,owner_lname,shop_name,address,location,service,contact FROM professionals WHERE location='".$loca."' and service='".$serve."';";

       $retval = mysqli_query( $conn,$sql);

       if($retval->num_rows==0){
         echo "hh";
         header('Location:service_home.php');
         exit();
       }
       if(! $retval ) {
         die('Could not get data: ' . mysqli_error($conn));
       }
    }
?>
<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="service_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="landing.js"></script>
 </head>
 <body>
    <div class="topnav" id="myTopnav">
        <a href="index.html#home">HOME</a>
        <a href="index.html#about">ABOUT</a>
        <a href="index.html#services">SERVICES</a>
        <a href="index.html#contact">CONTACT</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunc()">
          <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="userform">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="location">
              Help us serve you better :
              <select id="loc" name="loca">
                <option >CHOOSE A LOCATION</option>
                <option value="mumbai">MUMBAI</option>
                <option value="pune">PUNE</option>
                <option value="navi mumbai">NAVI MUMBAI</option>
              </select>
          </div>
          <div class="service">
              <select id="ser" name="serve">
                <option>CHOOSE A SERVICE</option>
                <option value="home cleaning">HOME CLEANING</option>
                <option value="appliance repair">APPLIANCE REPAIR</option>
                <option value="beauty and spa">BEAUTY AND SPA</option>
                <option value="health and wellness">HEALTH AND WELLNESS</option>
                <option value="bussiness and taxes">BUSSINESS AND TAXES</option>
              </select>
          </div>
          <input id="sub" type="submit" value="SUBMIT">
        </form>
    </div>
    <?php
      if(isset($loca)){
      while($row = mysqli_fetch_assoc($retval)) { ?>
      <div class="service_card">
        <?php echo "OWNER FIRST NAME :{$row['owner_fname']}  <br><br> ".
        "OWNER LAST NAME : {$row['owner_lname']}<br><br> ".
        "SHOP NAME : {$row['shop_name']} <br><br> ".
        "ADDRESS : {$row['address']} <br><br> ".
        "LOCATION : {$row['location']} <br><br> ".
        "SERVICE : {$row['service']} <br> <br>".
        "CONTACT : {$row['contact']} <br><br> ".
        "<br>"; ?>
      </div>
   <?php } ?>
 </div>
<?php } ?>

</body>
</html>
