<div class = "container-fluid">
	<form method = "post" action = "registration">
		<div class = "form-row">
			<div class = "form-group col-3">
				<label>Логин</label>
                <input type = "text" name = "login" class = "form-control" required>
			</div>
            <div class = "form-group col-3">
				<label>Пароль</label>
                <input type = "password" name = "password" class = "form-control" required>
			</div>
            <div class = "form-group col-3">
				<label>Имя</label>
                <input type = "text" name = "first_name" class = "form-control" required>
			</div>
            <div class = "form-group col-3">
				<label>E-mail</label>
                <input type = "email" name = "email" class = "form-control" required>
			</div>
            <div class = "form-group col-2">
				<label>Телефон</label>
                <input type = "text" name = "phone" class = "form-control" required>
			</div>
            <div class = "form-group col-2">
				<label>imei</label>
                <input type = "text" name = "device" class = "form-control" required>
			</div>
			<div class = "form-group col-1 align-self-end">
				<button type = "submit" class = "btn btn-primary">Добавить</button>
			</div>
		</div>
		<table class="table" id="table">
				<thead class = "thead-dark">
					<tr>
                    
						<th col = "">№</th>
						<th col = "">Логин</th>
                        <th col = "">Пароль</th>
						<th col = "">Имя</th>
						<th col = "">E-mail</th>
                        <th col = "">Телефон</th>
                        <th col = "">imei</th>
					</tr>
				</thead>
				<tbody>
	<?php
			foreach ($users as $item){
				echo '<tr>';
                echo '		<td>'.$item['id'].'</td>';
                echo '		<td>'.$item['login'].'</td>';
				echo '		<td>'.$item['password'].'</td>';
				echo '		<td>'.$item['name_user'].'</td>';
                echo '		<td>'.$item['email'].'</td>';
                echo '		<td>'.$item['phone'].'</td>';
                echo '		<td>'.$item['device'].'</td>';
				echo '</tr>';
			}			
	?>
				</tbody>
			</table>
	</form>
</div>