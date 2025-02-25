<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">
<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
<div class="w3-container w3-display-container w3-padding-16">
<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
<h3 class="w3-wide"><b>
<?php
session_start();
if(isset($_SESSION['fullname'])) {
    echo 'Chào bạn ' . $_SESSION['fullname'];
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT img_profile FROM customers WHERE id = '" . $_SESSION['id'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<img src="./uploads/' . $row['img_profile'] . '" alt="Ảnh profile">';
}
?>
</b></h3>
<a href="thoat.php" class="w3-bar-item w3-button w3-red">Đăng xuất</a>
<br>
<a href="sua_mk.php" class="w3-bar-item w3-button w3-red">Đổi mật khẩu</a>
</div>
<div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
<a href="#" class="w3-bar-item w3-button">Shirts</a>
<a href="#" class="w3-bar-item w3-button">Dresses</a>
<a href="#" class="w3-bar-item w3-button">Jackets</a>
<a href="#" class="w3-bar-item w3-button">Gymwear</a>
<a href="#" class="w3-bar-item w3-button">Blazers</a>
<a href="#" class="w3-bar-item w3-button">Shoes</a>
</div>
<a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
<a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
</nav>

<!-- Page content -->
<div class="w3-main" style="margin-left:250px">
<header class="w3-container w3-xlarge">
<p class="w3-right">
<i class="fa fa-shopping-cart w3-margin-right"></i>
<i class="fa fa-search"></i>
</p>
</header>

<div class="w3-container w3-text-grey" id="jeans">
<p>8 items</p>
</div>

<!-- Subscribe section -->
<div class="w3-container w3-black w3-padding-32">
<h1>Subscribe</h1>
<p>To get special offers and VIP treatment:</p>
<p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
<button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
</div>
<!-- Footer -->
<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
<div class="w3-row-padding">
<div class="w3-col s4">
<h4>Contact</h4>
<p>Questions? Go ahead.</p>
<form action="/action_page.php" target="_blank">
<p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
<p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
<p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
<p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
<button type="submit" class="w3-button w3-block w3-black">Send</button>
</form>
</div>
</div>
</footer>
</div>
<script>
function w3_open() {
document.getElementById("mySidebar").style.display = "block";
document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
document.getElementById("mySidebar").style.display = "none";
document.getElementById("myOverlay").style.display = "none";
}
</script>
</body>
</html>
