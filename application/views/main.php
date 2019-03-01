	<!-- начало макета main -->
	<div class = "container-fluid">
		<!-- <form method="post" action="order"> -->
		<!-- здесь уточнить сколько форм должно быть-->
			<div class = "form-row">
				<!-- вертикальная панель выбора товара-->
				<div class = "form-group col-2">
					<ul class = "list-group">
						<button type = "button" class = "list-group-item active">Группа товаров</button>
<?php
			foreach($category as $item)
			{//name = "action"
				echo '<button type = "submit" name = "category_id" class = "list-group-item list-group-item-action" value = "'.$item['id'].'">'.$item['name_category'].'</button>';
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
				echo '		<img src = "/assets/images/'.$item['photo'].'" alt="'.$item['name_product'].'" style = "height:150px;">';
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
	<!-- конец макета main-->