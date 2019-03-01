<div class = "container-fluid">
	<?=form_open('orders/order')?>
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
			foreach ($market as $item){
				echo '<option value = "'.$item['id'].'">'.$item['name_market'].'</option>';
			}
?>				
				</select>
            </div>
            <div class = "form-group col-3">
                    <label>Прайс</label>
                    <select name = "id_price" class ="form-control">
<?php
            foreach ($price as $item){
                 echo '<option value = "'.$item['id_price'].'">'.$item['price'].'</option>';
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
						<th col = "">Дата заказа</th>
						<th col = "">Дата оплаты</th>
						<th col = "">№ торговой точки</th>
						<th col = "">№ прайса</th>
						<th col = "">Количество заказа</th>
						<th col = "">№ пользователя</th>
					</tr>
				</thead>
				<tbody>
	<?php
			foreach ($order as $item){
				echo '<tr>';
				echo '		<td>'.$item['id'].'</td>';
				echo '		<td>'.$item['data_order'].'</td>';
				echo '		<td>'.$item['data_payment'].'</td>';
				echo '		<td>'.$item['id_trading'].'</td>';
				echo '		<td>'.$item['id_price'].'</td>';
				echo '		<td>'.$item['count_order'].'</td>';
				echo '		<td>'.$item['id_user'].'</td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>
</div>