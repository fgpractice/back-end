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


          <!-- Навигация -->
          <ul class="navbar-nav ml-auto">

            <!-- Форма поиска для маленьких экранов -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
             
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

        </nav>
        <!-- Конец шапки -->