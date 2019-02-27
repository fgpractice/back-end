	<!-- начало макета main -->
	<div class = "container-fluid">
		<!-- здесь уточнить сколько форм должно быть-->
		<form method = "post" action = "">
			<div class = "form-row">
				<!-- вертикальная панель выбора товара-->
				<div class = "form-group col-2">
					<ul class = "list-group">
						<button type = "button" class = "list-group-item active">Группа товаров</button>
<?php
			foreach($category as $item)
			{
				echo '<button type = "submit" name = "action" class = "list-group-item list-group-item-action" value = "'.$item['id'].'" name = "id_group">'.$item['name_category'].'</button>';
			}
?>					
					</ul>
				</div>			
				<!-- -->			
			<div class = "col-10">
			<!-- поиск товара-->
			<div class = "form-row">
				<div class = "form-group col-6 offset-1">
					<input type = "text" name = "name_product" class = "form-control">
				</div>
				<div class = "form-group col-1">
					<button type = "submit" class = "btn btn-primary">Поиск</button>
				</div>
			</div>
			<!-- список товаров-->
			<div class = "row">
<?php	
			foreach($product as $item){
				echo '<div class = "col-3">';
				echo '	<div class = "card">';
				echo '		<img src = "assets/images/'.$item['photo'].'" style = "height:150px;">';
				echo '		<div class = "card-body">';
				echo '			<h5>'.$item['name_product'].'</h5>';
				echo '			<p><b>Описание товара:</b></p>';
				echo '			<p>'.$item['description'].'</p>';
				echo '			<p><b>Ед. измерения:</b> '.$item['measure_unit'].'</p>';
				echo '		</div>';
				echo '	</div>';
				echo '</div>';	
			}
?>				
			</div>
			</div>
			<!-- -->
			</div>
		</form>			
	</div>
	<!-- модальное окно при нажатии на кнопку "Торговая точка" -->
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
				foreach($trading as $item){
					echo '<p><button type = "submit" class = "btn btn-link">'.$item['type_market'].' '.$item['name_market'].'</button></p>';
				}
?>
					</div>
				</div>
			</div>
		</div>
	<!-- конец макета main-->