<div class = "container-fluid">
	<form method = "post" action = "">
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
	</form>
</div>