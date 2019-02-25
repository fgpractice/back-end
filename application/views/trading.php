<div class = "container-fluid">
	<form method = "post" action = "trading">
		<div class = "form-row">
			<div class = "form-group col-2">
				<label>Тип магазина</label>
				<select name = "type_trading" class ="form-control">
					<option>Торговый центр</option>
					<option>Ларек</option>
					<option>Супермаркет</option>
					<option>Гипермаркет</option>
				</select>
			</div>
			<div class = "form-group col-3">
				<label>Название</label>
				<input type = "text" name = "name_trading" class = "form-control">
			</div>		
			<div class = "form-group col-3">
				<label>ФИО директора</label>
				<input type = "text" name = "fio" class = "form-control">
			</div>
			<div class = "form-group col-2">
				<label>Контактные данные</label>
				<input type = "text" name = "contact" class = "form-control">
			</div>
			<div class = "form-group col-2">
				<label>Адрес</label>
				<input type = "text" name = "address_trading" class = "form-control">
			</div>
			<div class = "form-group col-2">
				<label>Банковский реквизит</label>
				<input type = "text" name = "bank_account" class = "form-control">
			</div>
			<div class = "form-group col-1 align-self-end">
				<button type = "submit" class = "btn btn-primary">Добавить</button>
			</div>
		</div>
		<table class="table">
			<thead class = "thead-dark">
				<tr>
					<th col = "">№</th>
					<th col = "">Тип</th>
					<th col = "">Название</th>
					<th col = "">ФИО директора</th>
					<th col = "">Контакты</th>
					<th col = "">Адрес</th>
					<th col = "">Банковский реквизит</th>
				</tr>
			</thead>
			<tbody>
<?php
		foreach ($trading as $item){
			echo '<tr>';
			echo '		<td>'.$item['id_trading'].'</td>';
			echo '		<td>'.$item['type_trading'].'</td>';
			echo '		<td>'.$item['name_trading'].'</td>';
			echo '		<td>'.$item['fio'].'</td>';
			echo '		<td>'.$item['contact'].'</td>';
			echo '		<td>'.$item['address_trading'].'</td>';
			echo '		<td>'.$item['bank_account'].'</td>';
			echo '	</tr>';
		}			
?>
			</tbody>
		</table>
	</form>
</div>