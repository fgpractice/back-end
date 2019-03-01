<div class = "container-fluid">
	<?=form_open('prices/price')?>
		<div class = "form-row">
			<div class = "form-group col-3">
				<label>Товар</label>
				<select name = "product_id" class ="form-control">
<?php
			foreach ($product as $item){
				echo '<option value = "'.$item['id'].'">'.$item['name_product'].'</option>';
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
				echo '		<td>'.$item['id'].'</td>';
				echo '		<td>'.$item['price'].'</td>';
				echo '		<td>'.$item['product_id'].'</td>';
				echo '		<td>'.$item['supplier'].'</td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>
</div>