  <!-- Обертка страницы (Wrapper) -->
  <div id="wrapper">
    <!-- Подключение бокового меню (SideBar)-->
    <?php
      include 'sidebar.php';
    ?>
    <!-- Контент обертки -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Основной контент -->
        <div id="content">

        <!-- Шапка (навбар) -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Сворачивание бокового меню (шапка) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Форма поиска -->
          <form method="post" action="order" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <!-- Кнопка торговая точка -->
             <button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#exampleModal">
                <?= $text_market; ?>
              </button>
            </div>
          </form>
          <form method="post" action="order">
          <!-- Навигация -->
          <ul class="navbar-nav ml-auto">
             
            <!-- Пункт мнню. Информация о пользователе -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$text_login;?></span>
              </a>
              <!-- Выпадающее меню -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Выйти
                </a>
              </div>
            </li>

          </ul>

    <!-- modal fade -->
    <div class = "modal fade" id = "exampleModal" tabindex = "-1" role = "dialog">
			<div class = "modal-dialog" role = "document">
				<div class = "modal-content">
					<div class = "modal-header">
						<h5>Выберите торговую точку</h5>
						<button type = "button" class = "close" data-dismiss = "modal">
							<span aria-hidden = "true">&times;</span>
						</button>
					</div>
					<div class = "modal-body">
<?php
				foreach($market as $item){
					echo '<p><button type = "submit" class = "btn btn-link" value="'.$item['id'].'" name="id_market">'.$item['type_market'].' '.$item['name_market'].'</button></p>';
				}
?>
					</div>
				</div>
			</div>
    </div>
      </form>
	<!-- /modal fade -->
        </nav>
        <!-- Конец шапки -->