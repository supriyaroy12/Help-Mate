<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location:admin.php');
  //  echo '<script language="javascript">';
  //  echo 'alert("OOPS! YOU ARE NOT THE ADMIN.");';
    //echo '</script>';

    exit();
  }
 ?>
<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="choice.css">
  <meta name="viewport" content="width=device-width, inital-scale=1">
</head>
<body>
    <legend><p id="para">ADMIN</p> </legend>
      <form class="choice">
        <div class="page">
          <div class="create">
            <a id="c" href="service.php">CREATE A PROFESSIONAL</a>
          </div>
          <div class="up">
            <a id="u" href="update.php">UPDATE A PROFESSIONAL</a>
          </div>
          <div class="del">
            <a id="d" href="delete.php">DELETE A PROFESSIONAL</a>
          </div>
          <div class="logout" style="text-align:center;">
            <a id="l" href="logout.php">LOGOUT</a>
          </div>

        </div>
      </form>
  </body>
</html>
