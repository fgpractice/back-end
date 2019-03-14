<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('users/index')?>

<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Управление пользователями</h1>
</div>

  <div class="form-row align-items-center">	
	<div class="col-auto my-1">
	  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить пользователя</a>
	</div>
  </div>
<hr>

<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список пользователей</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>Логин</th>
			<th>Пароль</th>
			<th>Имя</th>
			<th>E-mail</th>
			<th>Телефон</th>
			<th>IMEI</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($user as $item){
			echo '<tr>';
			echo '	<td><input type="hidden" value="'.$item['id'].'" name="id_user" id="id_user">'.$item['id'].'</td>';
			echo '	<td>'.$item['login'].'</td>';
			echo '	<td>'.$item['password'].'</td>';
			echo '	<td>'.$item['name_user'].'</td>';
			echo '	<td>'.$item['email'].'</td>';
			echo '	<td>'.$item['phone'].'</td>';
			echo '	<td>'.$item['device'].'</td>';
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
<?=form_close()?>
</div>
<!-- /.container-fluid -->

<?=form_open('users/insert')?>
<!-- Модальное окно добавления записи-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              	<h5 class="modal-title" id="exampleModalLabel">Добавление пользователя</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="insertLogin">Логин:</label>
                        <input required id="insertLogin" name="login" class="form-control" type="text" placeholder="Введите логин">
                    </div>
                    <div class="form-group">
                        <label for="insertPassword">Пароль:</label>
                        <input id="insertPassword" name="password" class="form-control" type="password" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <label for="insertName">Имя:</label>
                        <input id="insertName" name="name_user" class="form-control" type="text" placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label for="insertEmail">Email:</label>
                        <input id="insertEmail" name="email" class="form-control" type="email" placeholder="Введите Email">
                    </div>
                    <div class="form-group">
                        <label for="insertPhone">Телефон:</label>
                        <input id="insertPhone" name="phone" class="form-control" type="tel" placeholder="Введите телефон">
                    </div>
                    <div class="form-group">
                        <label for="insertIMEI">IMEI:</label>
                        <input id="insertIMEI" name="device" class="form-control" type="text" placeholder="Введите IMEI">
                    </div>   
            </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_user','Добавить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>

<?=form_open('users/update')?>
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
                        <label for="editLogin">Логин:</label>
                        <input required id="editLogin" name="editLogin" class="form-control" type="text" placeholder="Введите логин">
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Пароль:</label>
                        <input id="editPassword" name="editPassword" class="form-control" type="password" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <label for="editName">Имя:</label>
                        <input id="editName" name="editName" class="form-control" type="text" placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input id="editEmail" name="editEmail" class="form-control" type="email" placeholder="Введите Email">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Телефон:</label>
                        <input id="editPhone" name="editPhone" class="form-control" type="tel" placeholder="Введите телефон">
                    </div>
                    <div class="form-group">
                        <label for="editIMEI">IMEI:</label>
                        <input id="editIMEI" name="editIMEI" class="form-control" type="text" placeholder="Введите IMEI">
                    </div>
                    
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('update_user','Изменить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>

<?=form_open('users/delete')?>
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
              <?=form_submit('delete_user','Удалить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>
<?php
	//подключение подвала
	include 'temp/footer.php';
?>