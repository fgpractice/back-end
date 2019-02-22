	<!-- начало макета navbar -->
	<nav class = "navbar navbar-dark bg-white border border-primary">
		<div class = "col-3">
			<img src = "images/logo.png">
			<button type = "button" class = "btn btn-link" data-toggle = "modal" data-target = "#exampleModal">Торговая точка</button>
        </div>
        <div class = "col-8">
            <a href = "" class = "btn btn-outline-primary">Регистрация</a>
            <div class = "btn-group" role = "group">
                <button id = "btnGroupDrop1" class = "btn btn-outline-primary dropdown-toggle" type = "button" data-toggle = "dropdown">Ввод</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
<?php    
            echo '       <a class="dropdown-item" href="'.base_url().'home/trading">Торговой точки</a>';
?>
                    <a class="dropdown-item" href="home/group_product">Группы товара</a>
                    <a class="dropdown-item" href="home/price">Прайса</a>
                    <a class="dropdown-item" href="home/product">Товара</a>
                    <a class="dropdown-item" href="home/order">Заказа</a>
                </div>
            </div>
        </div>
        <div class = "col-1">
            <a href = "home/out" class = "btn btn-outline-danger">Выход</a>
        </div>
	</nav>
	<!-- конец макета navbar -->