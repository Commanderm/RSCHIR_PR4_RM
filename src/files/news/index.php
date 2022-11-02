<?php

/*http://user1:cisco@localhost/files/news/index.php*/

header('Content-type: json/application'); //указываем, что результат запроса возвращается в формате JSON
require 'functions.php';


$method = $_SERVER['REQUEST_METHOD'];

$mysqli = new mysqli("database", "user", "password", "userDB");

$q = $_GET['q']; //$_GET, $_POST — суперглобальные переменные 
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

switch ($method) {
	case 'GET':
		if ($type == 'posts')
			if (isset($id))
				getPost($mysqli, $id);
			else 
				getPosts($mysqli);
		break;
	case 'POST':
		if ($type == 'posts')
			addPost($mysqli, $_POST);
	case 'PATCH':
		if ($type == 'posts')
			if (isset($id)) {
				$data = file_get_contents('php://input');
				$data = json_decode($data, true);
				updatePost($mysqli, $id, $data);
			}
			else {
				http_response_code(400); 
			}

	case 'DELETE':
		if ($type === 'posts')
			if (isset($id)) {
				deletePost($mysqli, $id, $data);
			}

	default:
		break;
}


?>


<!DOCTYPE html> <!-- Тип документа для браузера -->
<html lang="en"> 
<head>
    <meta charset="UTF-8"> <!-- Кодировка страницы -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Для совместимости с IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Для красивого отображения на мобильных устройствах-->
    <title>News</title> <!-- Заголовок страницы -->
    <link rel="stylesheet" href="news.css">

    <link rel="icon" href="Rombek.ico" type="image/x-icon">
</head>

<body>
	<div class="flex-2">
	    <div class="head">
	    	
	    	<nav class="header">
        		<div class="logo">
	            	<div class="symbol" onclick="button_clicked(this)">
		                <div class="bar1"></div>
		                <div class="bar2"></div>
		                <div class="bar3"></div>
	            	</div>
            		<a href="Psybolord.html"><img src="Rombek.svg" width="60px"></a>
        		</div>
		        <div class="menu">
		            <div class="el"><mark>NEWS</mark></div>
	                <div class="el"><a href="albums.html">MUSIC</a></div>
	                <div class="el"><a href="videos.html">VIDEOS</a></div>
	                <div class="el"><a href="store.html">STORE</a></div>
		        </div>
    		</nav>

	    </div>
	    
	    <div class="news">
	    	<div class="division">
		    	<div class="line">
		    		
		    		<!-- СОДЕРЖИМОЕ -->

		    		<div class="all-rows">
				    	<div class="all-news">
							
							<div class="news-wrapper">
								<a href="" class="product">
									<div class="product-photo">
										<img src="news1.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">18.11.21</i></p>
									<p><b class="cards-text">Black Friday bundle</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>

							<div class="news-wrapper">
								<a href="" class="product-1" position="top:">
									<div class="product-1-photo">
										<img src="news2.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">04.11.21</i></p>
									<p><b class="cards-text">Psybolord at ‘Gradient’</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>
							
							<div class="news-wrapper">
								<a href="" class="product">
									<div class="product-photo">
										<img src="Electro1.png" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">18.10.21</i></p>
									<p><b class="cards-text">Psybolord at ‘Electrofest’</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>

							<div class="news-wrapper">
								<a href="" class="product-1">
									<div class="product-1-photo">
										<img src="news4.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">18.09.20</i></p>
									<p><b class="cards-text">Psybolord at ‘RETROWAVE NIGHT’</b></p>
								</a>

							</div>

							<div class="news-wrapper">
								<a href="" class="product">
									<div class="product-photo">
										<img src="news5.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">23.08.21</i></p>
									<p><b class="cards-text">Psybolord at ‘Hôtel’</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>

							<div class="news-wrapper">
								<a href="" class="product-1" position="top:">
									<div class="product-1-photo">
										<img src="news6.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">06.08.21</i></p>
									<p><b class="cards-text">5 years on stage</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>
							
							<div class="news-wrapper">
								<a href="" class="product">
									<div class="product-photo">
										<img src="news7.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">31.07.21</i></p>
									<p><b class="cards-text">Vinyl "Sirin" is already in stores</b></p>
									<!-- <p><i class="cards-read">Read more →</i></p>  -->
								</a>

							</div>

							<div class="news-wrapper">
								<a href="" class="product-1">
									<div class="product-1-photo">
										<img src="news8.jpg" alt="Avatar" style="width:100%">
									</div>
									<p><i class="cards-date">22.12.20</i></p>
									<p><b class="cards-text">The filming of the video is over</b></p>
								</a>

							</div>

						</div>
					</div>
		    	</div>
	    	</div>
    	</div>
    </div>	



	<div class="footer">
        <!-- <div class="division">
          <div class="black-footer"> -->
      <div class="black_line">
              
            <div class="social">
              <a href="https://www.facebook.com/psybolord"><div class="icon"><img src="Facebook.svg" width="100%"></div></a>
              <a href="https://vk.com/psblrd"><div class="icon"><img src="Vk.svg" width="100%" alt="Vk"></div></a>
              <a href="https://www.youtube.com/channel/UCKS373f0b7XZTo7C8pgz2lg?view_as=subscriber"><div class="icon"><img src="Youtube.svg" width="100%" alt="Youtube"></div></a>
              <a href="https://www.instagram.com/psybolord/"><div class="icon"><img src="Instagram.svg" width="100%" alt="Instagram"></div></a>
              <a href="https://soundcloud.com/psybolord"><div class="icon"><img src="Soundcloud.svg" width="100%" alt="Soundcloud"></div></a>
              <a href="https://t.me/psybolord"><div class="icon"><img src="Telegram.svg" width="100%" alt="Telegram"></div></a>
              <a href="https://psybolord.bandcamp.com/"><div class="icon"><img src="BandCamp.svg" width="100%" alt="Bandcamp"></div></a>
            </div>
            <!-- <img class="email" src="email.svg" alt="email"> -->  
            <div class="email"> <span class="bold"> &#128386;</span> chuka-kauchuka@mail.ru</div>
            <div class="rights">©  2021 Psybolord All rights reserved</div>
            <div class="Marsstrange">Made by Marsstrange</div>
            <!-- </div>
          </div>   -->


        </div>  
        
      </div> 

  </body>
</html>





  <script> /*для header*/
        function button_clicked(x) {
            x.classList.toggle("change");
            if (document.querySelector(".header .menu").style.getPropertyValue("display") == "flex") {
                document.querySelector(".header .menu").style.display = "none";
            } 
            else {
                document.querySelector(".header .menu").style.display = "flex";
            }
        }
        document.getElementsByTagName("BODY")[0].onresize = function() {resize_check()};
        function resize_check(){
            // window.getComputedStyle(document.getElementById("list")).style.getPropertyValue("flex-direction")
            console.log(document.querySelector(".symbol").classList.contains("change"));
            if (window.innerWidth >= 700) {
                if(document.querySelector(".symbol").classList.contains("change")){
                    document.querySelector(".symbol").classList.remove("change");
                }
                document.querySelector(".header .menu").style.display = "flex";
            }
            else if(!document.querySelector(".symbol").classList.contains("change")){
                document.querySelector(".header .menu").style.display = "none";
            }
        }

    </script>
  
</body>
</html>