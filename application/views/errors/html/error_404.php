<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1,h2 {
	color: #444;
    background-color: transparent;
    font-size: 10rem;
    font-weight: bold;
	text-align: center;
	margin: 3rem;
}
h2{
	font-size: 3rem;
}

#container {
	height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

p {
	font-size: 1.2rem;
	text-align: center;
}
</style>
</head>
<body>
	<div id="container">

		<h1>404</h1>
		<h2>Not Found :(</h2>
		<p id="message">Anda akan dialihkan ke halaman lain dalam 15</p>


		<?php // echo $heading; ?>
		<?php // echo $message; ?>
	</div>

	<script>
    window.onload = function() {
            var seconds = 15;
            var countdownElement = document.getElementById("message");
            var countdownInterval = setInterval(function() {
                countdownElement.innerHTML = "Anda akan dialihkan ke halaman lain dalam " + seconds;
                seconds--;
                if (seconds < 0) {
                    clearInterval(countdownInterval);
                    window.history.back();
                }
            }, 1000);
        };
</script>
</body>
</html>