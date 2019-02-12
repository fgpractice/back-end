<div class = "container-fluid">
	<form method = "post" action = "">
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
	</form>
</div>