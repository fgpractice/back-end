<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('products/product')?>

<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Управление товарами</h1>
</div>

  <div class="form-row align-items-center">	
	<div class="col-auto my-1">
	  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить товар</a>
	</div>
  </div>
<hr>

<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список товаров</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>№ категории</th>
			<th>Наименование товара</th>
			<th>Описание</th>
			<th>Единица измерения</th>
			<th>Фото</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($product as $item){
			echo '<tr>';
			echo '	<td><input type="hidden" value="'.$item['id'].'" name="id_product" id="id_product">'.$item['id'].'</td>';
			echo '	<td>'.$item['category_id'].'</td>';
			echo '	<td>'.$item['name_product'].'</td>';
			echo '	<td>'.$item['description'].'</td>';
			echo '	<td>'.$item['measure_unit'].'</td>';
			echo '	<td><img src="/assets/images/content/'.$item['photo'].'" alt="'.$item['name_product'].'" style="height:35px;"></td>';
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
              	<h5 class="modal-title" id="exampleModalLabel">Добавление товара</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
						<label for="insertId_Category">Категория товара:</label>
						<select required id="insertId_Category" name="id_category" class="form-control">
<?php
				foreach ($category as $item){
					echo '<option value = "'.$item['id'].'">'.$item['name_category'].'</option>';
				}		
?>
						</select>	
                    </div>
                    <div class="form-group">
                        <label for="insertName_Product">Наименование товара:</label>
                        <input id="insertName_Product" name="name_product" class="form-control" type="text" placeholder="Введите наименование товара">
                    </div>
                    <div class="form-group">
                        <label for="insertDescription">Описание:</label>
                        <input id="insertDescription" name="description" class="form-control" type="text" placeholder="Введите описание товара">
                    </div>
                    <div class="form-group">
                        <label for="insertMeasure_unit">Единица измерения:</label>
						<select required id="insertMeasure_unit" name="measure_unit" class="form-control">
							<option>г</option>
							<option>кг</option>
							<option>л</option>
							<option>шт</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="insertPhoto">Фото:</label>
                        <input reuqired id="insertPhoto" name="photo" class="form-control-file" type="file">
                    </div>
            </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_product','Добавить', 'class="btn btn-primary"')?>
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
					<label for="updateId_Category">Категория товара:</label>
					<select required id="updateId_Category" name="id_category" class="form-control">
<?php
				foreach ($category as $item){
					echo '<option value = "'.$item['id'].'">'.$item['name_category'].'</option>';
				}		
?>
					</select>	
                </div>
                <div class="form-group">
                    <label for="editName_Product">Наименование товара:</label>
                    <input id="editName_Product" name="editName_product" class="form-control" type="text" placeholder="Введите наименование товара">
                </div>
                <div class="form-group">
                    <label for="editDescription">Описание:</label>
                    <input id="editDescription" name="editDescription" class="form-control" type="text" placeholder="Введите описание товара">
                </div>
                <div class="form-group">
                    <label for="editMeasure_unit">Единица измерения:</label>
					<select required id="editMeasure_unit" name="editMeasure_unit" class="form-control">
						<option>г</option>
						<option>кг</option>
						<option>л</option>
						<option>шт</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="editPhoto">Фото:</label>
                    <input reuqired id="editPhoto" name="editPhoto" class="form-control-file" type="file">
                </div>
                    
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('update_product','Изменить', 'class="btn btn-primary"')?>
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
              <?=form_submit('delete_product','Удалить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?php
	//подключение подвала
	include 'temp/footer.php';
?>