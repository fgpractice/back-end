<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
        <div class="container-fluid">
        	<!-- Заголовок страницы -->
          	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Главная</h1>
            	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Сделать заказ</a>
          	</div>
          	<!-- Строка контента -->
          	<div class="row">
            	<div class="card-deck">
              		<div class="card">
                		<img src="assets/images/content/neffoc5cl.jpg" class="card-img-top" alt="...">
                		<div class="card-body">
                  			<h5 class="card-title">Neffoc C5L</h5>
                  			<p class="card-text">Ультратонкий телефон.</p>
                		</div>
              		</div>
              <div class="card">
                <img src="assets/images/content/sharpsjxg55pmsl.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Холодильник Sharp SJXG55PMSL</h5>
                  <p class="card-text">Непревзойденный холодильник в повседневности.</p>
                </div>
              </div>
              <div class="card">
                <img src="assets/images/content/hp250g6.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ноутбук HP 250 G6</h5>
                  <p class="card-text">Неплохой ноутбук.</p>
                </div>
              </div>
              <div class="card">
                <img src="assets/images/content/sven120.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Колонки 2.0 SVEN 120</h5>
                  <p class="card-text">Обычные колонки для дома.</p>
                </div>
              </div>
            </div>
		  </div>
		  <!-- /Строка контента-->
        </div>
		<!-- /Контент страницы -->
<?php
	//подключение подвала
	include 'temp/footer.php';
?>