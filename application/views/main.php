	<!-- начало макета main -->
	<div class = "container-fluid">
		<form method="post" action="order">
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
			<div class="form-row" style="margin:15px;">
				<button type="submit" class="btn btn-primary">Добавить заказ</button>
			</div>
			<div class = "form-row">
				<div class = "form-group col-6 offset-1">
					<input type = "text" name = "name_product" class = "form-control">
				</div>
				<div class = "form-group col-1">
					<button type = "submit" class = "btn btn-primary">Поиск</button>
				</div>
			</div>
			<!-- список товаров-->
			<!-- <div class = "row"> -->
			<table class="table" id="table">
				<thead class = "thead-dark">
					<tr>
						<th col = "">№</th>
						<th col = "">Фото</th>
						<th col = "">Наименование</th>
						<th col = "">Описание</th>
						<th col = "">Ед. измерения</th>
						<th col = "">Действие</th>
					</tr>
				</thead>
				<tbody>
	<?php
			foreach ($product as $item){
				echo '<tr>';
				echo '		<td>'.$item['id'].'</td>';
				echo '		<td><img src="/assets/images/'.$item['photo'].'" alt="'.$item['name_product'].'" style="height:35px;"></td>';	
				echo '		<td>'.$item['name_product'].'</td>';
				echo '		<td>'.$item['description'].'</td>';
				echo '		<td>'.$item['measure_unit'].'</td>';
				echo '		<td><button type="submit" class="btn btn-primary">Купить</button></td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>			
			<!-- </div> -->
			</div>
			<!-- -->
			</div>	
		</form>	
	</div>
	<!-- конец макета main-->