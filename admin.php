<?php
  session_start();
  if(isset($_SESSION['username'])){
    header('Location:choice.php');
    exit();
  }
  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "service_provider";

  $conn = new mysqli($servername,$username,$password,$dbname);

  if(isset($_POST["uname"])){
    $name = $_POST["uname"];
    $pass = $_POST["upass"];
    $sql = "SELECT * FROM admin WHERE username = '".$name."'";
    $result = $conn->query($sql);

    while ( $row = $result->fetch_assoc()) {
      if ($row["password"] == $pass){
        $_SESSION['username'] = $name;
        header('Location:choice.php');
        exit();
      }
    }
    header('Location:admin.php');
  //  echo '<script language="javascript">';
    //echo 'alert("USERNAME OR PASSWORD IS INCORRECT. PLEASE REENTER ADMIN DETAILS.");';
  //  echo '</script>';
}
?>



<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin.css">
  <meta name="viewport" content="width=device-width, inital-scale=1">
  <script type="text/javascript" src="admin.js"></script>
</head>
<body>
  <legend><p id="para">ADMIN LOGIN</p> </legend>
  <div class="adminform">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input id="user" type="text"  name="uname" placeholder="Username" style="border:none;border-bottom:groove;border-bottom-width:thin">
        <div class="passeye">
          <input id="pass" type="password" name="upass" placeholder="Password" style="border:none;border-bottom:groove;border-bottom-width:thin">
            <i style="font-size:18px;color:#696969" class="fa eye" onclick="showPassword()">&#xf06e;</i>
        </div>
        <input id="sub" type="submit" value="SUBMIT" style="border-width:thin">
      </form>
  </div>
</body>
</html>
