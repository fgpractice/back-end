<!-- Боковое меню (Sidebar) -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Логотип -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>home">
            <div class="sidebar-brand-icon">
            </div>
            <div class="sidebar-brand-text mx-3">FGPractice</div>
        </a>
        <!-- /Логотип -->
        <!-- Разделитель -->
        <hr class="sidebar-divider my-0">
        <!-- Пункт меню. Главная (активный) -->
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url()?>home">
            <i class="fas fa-fw fa-home"></i>
            <span>Главная</span></a>
        </li>
        <!-- Разделитель -->
        <hr class="sidebar-divider">
        <!-- Заголовок. Основные -->
        <div class="sidebar-heading">
            Основные
        </div>
        <!-- Пункт меню. Пользователи -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>users/registration">
            <i class="fas fa-fw fa-user"></i>
            <span>Пользователи</span></a>
        </li>
        <!-- Разделитель -->
        <hr class="sidebar-divider">
        <!-- Заголовок. Вводы -->
        <div class="sidebar-heading">
            Вводы
        </div>
        <!-- Пункт меню. Торговые точки -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>markets/market">
            <i class="fas fa-fw fa-store"></i>
            <span>Торговые точки</span></a>
        </li>
        <!-- Пункт меню. Категории -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>categories/category">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Категории</span></a>
        </li>
        <!-- Пункт меню. Прайс-листы -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>prices/price">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Прайс-листы</span></a>
        </li>
        <!-- Пункт меню. Товары -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>products/product">
            <i class="fas fa-fw fa-list"></i>
            <span>Товары</span></a>
        </li>
        <!-- Пункт меню. Заказы -->
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url()?>orders/order">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Заказы</span></a>
        </li>
        <!-- Разделитель -->
        <hr class="sidebar-divider">
        <!-- Сворачивание бокового меню (сайдбар) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>       
</ul>
<!-- Конец бокового меню -->