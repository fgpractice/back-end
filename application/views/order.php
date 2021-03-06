<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar_order.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('orders/create')?>
<!-- Заголовок страницы -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Оформление заказа</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?=base_url()?>sorder/index">Просмотр заказов</a>
		<?=form_submit('insert_order','Сделать заказ', 'class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"')?>		
        <!-- <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Сделать заказ</button> -->
    </div>
<?=form_close()?>

<?=form_open('orders/index')?>
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
			<th>Фото</th>
			<th>Наименование товара</th>
			<th>Описание</th>
			<th>Ед. измерения</th>
			<th>Редактирование</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($product as $item){
			echo '<tr>';
			echo '	<td>'.$item['id'].'</td>';
			echo '		<td><img src="/assets/images/content/'.$item['photo'].'" alt="'.$item['name_product'].'" style="height:35px;"></td>';	
			echo '		<td>'.$item['name_product'].'</td>';
			echo '		<td>'.$item['description'].'</td>';
			echo '		<td>'.$item['measure_unit'].'</td>';
			echo '	<td>';
			echo '		<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm insert_order" value="'.$item['id'].'" data-toggle="modal" data-target="#insertModal">';
			echo '		  <i class="fas fa-fw fa-shopping-cart"></i>';
			echo '  	</button>';
			// echo '		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#editModal">';
			// echo '			<i class="fas fa-pen fa-sm"></i>';
			// echo '  	</a>';
			// echo '  	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#deleteModal">';
			// echo '			<i class="fas fa-trash fa-sm"></i>';
			// echo '  	</a>';
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

<?=form_open('orders/insert')?>
<!-- Модальное окно добавления записи-->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              	<h5 class="modal-title" id="exampleModalLabel">Добавление заказа</h5>
              	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
              	</button>
            </div>
            <div class="modal-body">
              <div class="insertModal" id="insertValue">
                    <div class="form-group">
                        <label for="insertId_price">Прайс:</label>
                        <!-- <input type="hidden" value="" name="id_product" id="id_product"> -->
						            <select required id="insertId_price" name="id_price" class="form-control rachet">
<?php
				foreach ($price as $item){
					  echo '<option value = "'.$item['id'].'">'.$item['price'].'</option>';
				}
?>	
						            </select>
                    </div>
                    <div class="form-group">
                        <label for="insertTotal_count">Количество:</label>
                        <input id="insertTotal_count" name="total_count" class="form-control rachet" type="number" placeholder="Введите кол-во" value="1">
                    </div>
                    <div class="form-group total_amount">
                        <label for="insertTotal_amount">Сумма:</label>
                        <input id="insertTotal_amount" name="total_amount" class="form-control" type="text" value="0" disabled>
                    </div>
            </div>
          </div>
            <div class="modal-footer">
			  <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
			  <?=form_submit('insert_order_product','Заказать', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
<?=form_close()?>

<?=form_open('orders/update')?> 
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
              <?=form_submit('update_order_product','Изменить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
      </div>
 <?=form_close()?> 

 <?=form_open('orders/delete')?>
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
              <?=form_submit('delete_order_product','Удалить', 'class="btn btn-primary"')?>
            </div>
          </div>
        </div>
	  </div>
<?=form_close()?> -->

<?php
	//подключение подвала
	include 'temp/footer.php';
?>