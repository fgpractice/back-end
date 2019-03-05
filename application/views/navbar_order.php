    <!-- navbar_input -->
    <form method = "post" action="order">
	<nav class = "navbar navbar-dark bg-white border border-primary">
		<div class = "col-3">
            <img src = "<?=base_url()?>assets/images/logo.png" alt="Логотип компании">
			<button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#exampleModal">
                <?= $text_market; ?>
            </button>
        </div>
        <div class = "col-8">
            <a href = "<?=base_url()?>home" class = "btn btn-outline-primary">Главная</a>
            <a href = "<?=base_url()?>users/registration" class = "btn btn-outline-primary">Регистрация</a>    
            <div class = "btn-group" role = "group">
                <button id = "btnGroupDrop1" class = "btn btn-outline-primary dropdown-toggle" type = "button" data-toggle = "dropdown">Ввод</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">   
                    <a class="dropdown-item" href="<?=base_url()?>markets/market">Торговой точки</a>
                    <a class="dropdown-item" href="<?=base_url()?>categories/category">Группы товара</a>
                    <a class="dropdown-item" href="<?=base_url()?>prices/price">Прайса</a>
                    <a class="dropdown-item" href="<?=base_url()?>products/product">Товара</a>
                    <a class="dropdown-item" href="<?=base_url()?>orders/order">Заказа</a>
                </div>
            </div>
        </div>
        <div class = "col-1">
            <a href = "<?=base_url()?>home/out" class = "btn btn-outline-danger">Выход</a>
        </div>       
    </nav>
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
	<!-- /navbar_input -->