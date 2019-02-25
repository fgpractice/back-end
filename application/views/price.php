<div class = "container-fluid">
	<form method = "post" action = "price">
		<div class = "form-row">
			<div class = "form-group col-3">
				<label>Товар</label>
				<select name = "id_product" class ="form-control">
<?php
			foreach ($product as $item){
				echo '<option value = "'.$item['id_product'].'">'.$item['name_product'].'</option>';
			}
?>				
				</select>
			</div>
			<div class = "form-group col-1">
				<label>Цена</label>
				<input type = "text" name = "price" class = "form-control">
			</div>		
			<div class = "form-group col-2">
				<label>Поставщик</label>
				<input type = "text" name = "supplier" class = "form-control">
			</div>
			<div class = "form-group col-1 align-self-end">
				<button type = "submit" class = "btn btn-primary">Добавить</button>
			</div>
		</div>
		<table class="table" id="table">
				<thead class = "thead-dark">
					<tr>
						<th col = "">№</th>
						<th col = "">Цена</th>
						<th col = "">№ товара</th>
						<th col = "">Поставщик</th>
					</tr>
				</thead>
				<tbody>
	<?php
			foreach ($price as $item){
				echo '<tr>';
				echo '		<td>'.$item['id_price'].'</td>';
				echo '		<td>'.$item['price'].'</td>';
				echo '		<td>'.$item['id_product'].'</td>';
				echo '		<td>'.$item['supplier'].'</td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>
	</form>
</div>