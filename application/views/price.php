<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('prices/price')?>

<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Управление прайс-листами</h1>
</div>

  <div class="form-row align-items-center">	
	<div class="col-auto my-1">
	  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Добавить прайс-лист</a>
	</div>
  </div>
<hr>

<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список прайс-листов</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>№ товара</th>
			<th>Цена</th>
			<th>Поставщик</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($price as $item){
			echo '<tr>';
			echo '	<td><input type="hidden" value="'.$item['id'].'" name="id_price" id="id_price">'.$item['id'].'</td>';
			echo '	<td>'.$item['product_id'].'</td>';
			echo '	<td>'.$item['price'].'</td>';
			echo '	<td>'.$item['supplier'].'</td>';
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
              	<h5 class="modal-title" id="exampleModalLabel">Добавление прайс-листа</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="insertProduct">Товар:</label>
						            <select required id="insertProduct" name="id_product" class="form-control">
<?php
				foreach ($product as $item){
					echo '<option value = "'.$item['id'].'">'.$item['name_product'].'</option>';
				}
?>	
						           </select>
                    </div>
                    <div class="form-group">
                        <label for="insertPrice">Цена:</label>
                        <input id="insertPrice" name="price" class="form-control" type="text" placeholder="Введите цену">
                    </div>
                    <div class="form-group">
                        <label for="insertSupplier">Поставщик:</label>
                        <input id="insertSupplier" name="supplier" class="form-control" type="text" placeholder="Введите поставщика">
                    </div>
            </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_price','Добавить', 'class="btn btn-primary"')?>
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
                    <label for="editProduct">Товар:</label>
					<select required id="editProduct" name="editId_product" class="form-control">
<?php
				foreach ($product as $item){
					echo '<option value = "'.$item['id'].'">'.$item['name_product'].'</option>';
				}
?>	
					</select>
                </div>
                <div class="form-group">
                    <label for="editPrice">Цена:</label>
                    <input id="editPrice" name="editPrice" class="form-control" type="text" placeholder="Введите цену">
                </div>
                <div class="form-group">
                    <label for="editSupplier">Поставщик:</label>
                    <input id="editSupplier" name="editSupplier" class="form-control" type="text" placeholder="Введите поставщика">
                </div>
                    
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
              <?=form_submit('update_price','Изменить', 'class="btn btn-primary"')?>
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
              <?=form_submit('delete_price','Удалить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?php
	//подключение подвала
	include 'temp/footer.php';
?>