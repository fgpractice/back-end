<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('categories/index')?>

<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Управление категориями</h1>
</div>

  <div class="form-row align-items-center">	
	<div class="col-auto my-1">
	  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить категорию</a>
	</div>
  </div>
<hr>

<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список категории</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>Наименование категории</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($category as $item){
			echo '<tr>';
      echo '	<td><input type="hidden" value="'.$item['id'].'" name="id_category" id="id_category">'.$item['id'].'</td>';
			echo '	<td>'.$item['name_category'].'</td>';
			echo '	<td>';
			echo '		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#editModal">';
			echo '			<i class="fas fa-pen fa-sm"></i>';
			echo '  	</a>';
			echo '  	<button type="button" id="'.$item['id'].'" class="deleteModal d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm data-toggle="modal" data-target="#deleteModal">';
			echo '			<i class="fas fa-trash fa-sm"></i>';
			echo '  	</button>';
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

<?=form_open('categories/create')?>
<!-- Модальное окно добавления торговой точки-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              	<h5 class="modal-title" id="exampleModalLabel">Добавление категории</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="insertName_Category">Наименование категории:</label>
                        <input id="insertName_Category" name="name_category" class="form-control" type="text" placeholder="Введите наименование категории">
                    </div> 
            </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_category','Добавить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>

<?=form_open('categories/update')?>
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
                        <label for="updateName_Category">Название:</label>
                        <input id="updateName_Category" name="editName_category" class="form-control" type="text" placeholder="Введите наименование категории">
                    </div>  
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('update_category','Изменить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
  <?=form_close()?>

  <?=form_open('categories/delete')?>
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
              <?=form_submit('delete_category','Удалить', 'class="delete_cat btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>

<?php
	//подключение подвала
	include 'temp/footer.php';
?>