<?=doctype('html4-trans')?>
<html lang="ru">
<head>
    <!-- meta -->
	<?=meta('Content-Type','text/html; charset=Windows-1251')?>
	<?=meta(array('name' => 'Description', 'content' => 'internet-frigate'))?>
	<?=meta(array('name' => 'Keywords', 'content' => 'internet'))?>
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <!-- /meta -->
    <title>FGPractice - Вход</title>
    <!-- Шрифты -->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- /Шрифты -->
    <!-- Стили -->
    <link href="<?=base_url()?>assets/css/sba.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/custom-styles.css" rel="stylesheet">
    <!-- /Стили -->
</head>
<body class="bg-gradient-primary">
    <!-- Контейнер -->
    <div class="container">  
        <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Тело карточки -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> <!-- Картинка -->
                <div class="col-lg-6">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Вход в систему</h1>
                    </div>
                    <!-- Форма входа -->
                    <?=form_open('home')?>
                        <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="loginInput" name="login" placeholder="Введите логин" reguqired>
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="passwordInput" name="password" placeholder="Введите пароль" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Войти</button>
                    </div>
                </div>
                </div>
                <!-- /Тело карточки-->
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /Контейнер -->
  <!-- Скрипты формы входа-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>assets/js/sba.min.js"></script>
  <!-- /Скрипты формы входа-->
</body>
</html>