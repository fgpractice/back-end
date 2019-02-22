<div class = "container-fluid">
	<form method = "post" action = "order">
		<div class = "form-row">
            <div class="form-group col-3">
                <label>Дата оплаты</label>
                <input type = "date" class = "form-control" name = "data_payment">
            </div>
            <div class="form-group col-3">
                <label>Дата отправки</label>
                <input type = "date" class = "form-control" name = "data_sending">
            </div>
			<div class = "form-group col-3">
				<label>Торговая точка</label>
				<select name = "id_trading" class ="form-control">
<?php
			foreach ($trading as $item){
				echo '<option value = "'.$item['id_trading'].'">'.$item['name_trading'].'</option>';
			}
?>				
				</select>
            </div>
            <div class = "form-group col-3">
                    <label>Торговая точка</label>
                    <select name = "id_trading" class ="form-control">
<?php
            foreach ($price as $item){
                 echo '<option value = "'.$item['id_trading'].'">'.$item['name_trading'].'</option>';
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
		<table class="table">
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
				echo '	</tr>
			}			
	?>
				</tbody>
			</table>
	</form>
</div>