<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Simple Blog | Tambah Post</title>


</head>

<body class="default">


<?php include 'header.php';?>

<div class="wrapper">
<article class="art simple post">
    <div class="art-body">
        <div class="art-body-inner">
            <?php
			
				if (isset($_GET['postId'])) {
					echo "<h2>Edit Post</h2>";
					$postId = $_GET['postId'];
					$con = mysqli_connect("localhost","root","","if3110-tugas1");
					if (mysqli_connect_errno()) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con, "SELECT * FROM post WHERE id_post = ".$postId);
					$row = mysqli_fetch_array($result);
					$stat = true;
				} else {
					echo "<h2>New Post</h2>";
					$stat = false;
				}
				echo "<div id=\"contact-area\">";
					echo "<form method=\"post\" onSubmit = \"return checkDate(this.Tanggal)\" action=\"modify_database.php\">";
						echo "<label for=\"Judul\">Judul:</label>";
						echo "<input type=\"hidden\" name =\"PostId\" value =\"".($stat ? $row['id_post'] : ''). "\">";
						echo "<input type=\"text\" name=\"Judul\" id=\"Judul\" value = \"".($stat ? $row['judul'] : '')."\">";

						echo "<label for=\"Tanggal\">Tanggal:</label>";
						echo "<input type=\"text\" name=\"Tanggal\" id=\"Tanggal\" value = \"".($stat ? $row['tanggal_post'] : '')."\">";
						
						echo "<label for=\"Konten\">Konten:</label><br>";
						echo "<textarea name=\"Konten\" rows=\"20\" cols=\"20\" id=\"Konten\">".($stat ? $row['konten'] : '')."</textarea>";
						echo "<input type=\"submit\" name=\"submit\" value=\"Simpan\" class=\"submit-button\">";
					echo "</form>";
				echo "</div>";
			?>
        </div>
    </div>

</article>
<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>