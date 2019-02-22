<div class = "container-fluid">
	<form method = "post" action = "">
		<div class = "form-row">
			<div class = "form-group col-3">
				<label>Группа товара</label>
				<select name = "id_group" class = "form-control">
<?php
			foreach ($group_product as $item){
				echo '<option value = "'.$item['id_group'].'">'.$item['name_group'].'</option>';
			}		
?>
				</select>
			</div>
			<div class = "form-group col-4">
				<label>Наименование</label>
				<input type = "text" name = "name_product" class = "form-control">
			</div>
			<div class = "form-group col-5">
				<label>Описание</label>
				<input type = "text" name = "description" class = "form-control">
			</div>
			<div class = "form-group col-1">
				<label>Ед. изм.</label>
				<select name = "measure_unit" class = "form-control">
					<option>шт</option>
					<option>г</option>
					<option>л</option>
				</select>
			</div>
			<div class = "form-group col-2">
				<label>Фото</label>
				<input type = "text" name = "photo" class = "form-control">
			</div>
			<div class = "form-group col-1 align-self-end">
				<button type = "submit" class = "btn btn-primary">Добавить</button>
			</div>
		</div>
		<table class="table">
				<thead class = "thead-dark">
					<tr>
						<th col = "">№</th>
						<th col = "">Наименование</th>
						<th col = "">Описание</th>
						<th col = "">Ед. измерения</th>
						<th col = "">Фото</th>
						<th col = "">№ группы товара</th>
					</tr>
				</thead>
				<tbody>
	<?php
			foreach ($product as $item){
				echo '<tr>';
				echo '		<td>'.$item['id_product'].'</td>';
				echo '		<td>'.$item['name_product'].'</td>';
				echo '		<td>'.$item['description'].'</td>';
				echo '		<td>'.$item['measure_unit'].'</td>';
				echo '		<td>'.$item['photo'].'</td>';
				echo '		<td>'.$item['id_group'].'</td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>
	</form>
</div>