<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Pagina WEB a primariei</title>
<meta charset="utf-8">
<link rel="icon" href="images/brand.gif">
<link rel="shortcut icon" href="images/brand.gif">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/form.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/forms.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<?php 
$cookie_name = "loggedin";
if (isset($_COOKIE[$cookie_name]))
{
	$cookie_value = $_COOKIE[$cookie_name];
	if($cookie_value=="primar")
	{

	echo "Esti logat ca $cookie_value!";
}
else echo "Nu ai drepturi de administrator";
}
?>
<header>

	
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="main.php"><img src="images/logo_ro.png" alt=""></a> </h1>
      <div class="clear"></div>
      <div class="menu_block">
        <nav>
          <ul class="sf-menu">
            <li class="with_ul"><a href="main.php">Home</a></li>
            <li class="with_ul"><a href="Departamente.php">Departamente</a>
              <ul>
                <li><a href="organigrama.php">Organigrama</a></li>
              </ul>
            </li>
            <li class="with_ul"><a href="documente.php">Documente</a></li>
            
            <li class="with-ul"><a href="#">Contact</a>
			<ul>
                <li><a href="Chat.php">Chat</a></li> 
                <li><a href="Contact.php">Cerere audienta</a></li> </ul>
			</li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
      <div class="box">
	  
	<img src="images/organigrama.jpg" alt=""></div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      <p>Cotoi Dana, Pistritu Laurentiu, Liliana Patru, Tanasie Daria, Stanescu Nicoleta <a href="#" class="upp">Link</a></p>
      <address>
      Spatiu pentru adresa<br>
      Spatiu pentru telefon: +04 760 436 377
      </address>
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>