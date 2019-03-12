<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('markets/market')?>

<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Управление торговыми точками</h1>
</div>

  <div class="form-row align-items-center">	
	<div class="col-auto my-1">
	  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить торговую точку</a>
	</div>
  </div>
<hr>

<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список торговых точек</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>№ пользователя</th>
			<th>Тип</th>
			<th>Название</th>
			<th>Директор</th>
			<th>Контакты</th>
			<th>Адрес</th>
			<th>Банковский реквизит</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($market as $item){
			echo '<tr>';
			echo '	<td><input type="hidden" value="'.$item['id'].'" name="id_market" id="id_market">'.$item['id'].'</td>';
			echo '	<td>'.$item['user_id'].'</td>';
			echo '	<td>'.$item['type_market'].'</td>';
			echo '	<td>'.$item['name_market'].'</td>';
			echo '	<td>'.$item['name_owner'].'</td>';
			echo '	<td>'.$item['contact'].'</td>';
			echo '	<td>'.$item['address_market'].'</td>';
			echo '	<td>'.$item['bank_info'].'</td>';
			echo '	<td>';
			echo '		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#editModal">';
			echo '			<i class="fas fa-pen fa-sm"></i>';
			echo '  	</a>';
			echo '  	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#deleteModal">';
			echo '			<i class="fas fa-trash fa-sm"></i>';
			echo '  	</a>';
			echo '	</td>';
			echo '</tr>';
		}
?>
		</tbody>
	  </table>
	</div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Модальное окно добавления записи-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              	<h5 class="modal-title" id="exampleModalLabel">Добавление торговой точки</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
						<label for="insertType">Тип:</label>
						<select required id="insertType" name="type_market" class="form-control">
								<option>Ларек</option>
								<option>Супермаркет</option>
								<option>Гипермаркет</option>
						</select>	
                    </div>
                    <div class="form-group">
                        <label for="insertName_Market">Название:</label>
                        <input id="insertName_Market" name="name_market" class="form-control" type="text" placeholder="Введите название торг. точки">
                    </div>
                    <div class="form-group">
                        <label for="insertName_Owner">Директор:</label>
                        <input id="insertName_Owner" name="name_owner" class="form-control" type="text" placeholder="Введите ФИО директора">
                    </div>
                    <div class="form-group">
                        <label for="insertContact">Контакты:</label>
                        <input id="insertContact" name="contact" class="form-control" type="text" placeholder="Введите контактные данные">
                    </div>
                    <div class="form-group">
                        <label for="insertAddress">Адрес:</label>
                        <input id="insertAddress" name="address_market" class="form-control" type="text" placeholder="Введите адрес торг. точки">
                    </div>
                    <div class="form-group">
                        <label for="insertBank">Банковский реквизит:</label>
                        <input id="insertBank" name="bank_info" class="form-control" type="text" placeholder="Введите банковский реквизит">
                    </div>   
            </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_market','Добавить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>


<!-- Модальное окно изменение записи -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Изменение записи</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
					<div class="form-group">
                        <label for="editName_Market">Название:</label>
                        <input id="editName_Market" name="editName_market" class="form-control" type="text" placeholder="Введите название торг. точки">
                    </div>
                    <div class="form-group">
                        <label for="editName_Owner">Директор:</label>
                        <input id="editName_Owner" name="editName_owner" class="form-control" type="text" placeholder="Введите ФИО директора">
                    </div>
                    <div class="form-group">
                        <label for="editContact">Контакты:</label>
                        <input id="editContact" name="editContact" class="form-control" type="text" placeholder="Введите контактные данные">
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Адрес:</label>
                        <input id="editAddress" name="editAddress_market" class="form-control" type="text" placeholder="Введите адрес торг. точки">
                    </div>
                    <div class="form-group">
                        <label for="editBank">Банковский реквизит:</label>
                        <input id="editBank" name="editBank_info" class="form-control" type="text" placeholder="Введите банковский реквизит">
                    </div> 
                    
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('update_market','Изменить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
  
    <!-- Модальное окно подтверждения удаления записи -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Удаление записи</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Вы действительно хотите удалить эту запись?</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('delete_market','Удалить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?php
	//подключение подвала
	include 'temp/footer.php';
?>