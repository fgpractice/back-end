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
          	</div>
          	<!-- Строка контента -->
          	<div class="row">
<?php
          foreach($product as $item){
              echo '<div class="col-3">';
              echo '  <div class="card-deck">';
              echo '      <div class="card">';
              echo '        <img src="assets/images/content/'.$item['photo'].'" class="card-img-top" alt="'.$item['name_product'].'">';
              echo '        <div class="card-body">';
              echo '            <h5 class="card-title">'.$item['name_product'].'</h5>';
              echo '            <p class="card-text">'.$item['description'].'</p>';
              echo '        </div>';
              echo '      </div>';
              echo '  </div>';
              echo '</div>';
          }
?>
		        </div>
		  <!-- /Строка контента-->
        </div>
		<!-- /Контент страницы -->
<?php
	//подключение подвала
	include 'temp/footer.php';
?>