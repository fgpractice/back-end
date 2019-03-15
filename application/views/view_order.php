<?php
	//подключение head (html, подключение стилей и библиотек)
	include 'temp/head.php';
	//подключение навигационной + боковой панели
	include 'temp/navbar.php';
?>
<!-- Начало контента страницы -->
<div class="container-fluid">

<?=form_open('sorder/index')?>
<!-- Заголовок страницы -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Просмотр заказов</h1>
</div>


<!-- DataTales -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Список заказов</h6>
  </div>
  <div class="card-body">
	<div class="table-responsive">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
		  <tr>
			<th>№</th>
			<th>№ пользователя</th>
			<th>№ торговой точки</th>
			<th>Дата заказа</th>
			<th>Дата оплаты</th>
		  </tr>
		</thead>
		<tbody>
<?php
		foreach($order as $item){
			echo '<tr>';
			echo '	<td>'.$item['id'].'</td>';
			echo '	<td>'.$item['user_id'].'</td>';
			echo '	<td>'.$item['market_id'].'</td>';
            echo '	<td>'.$item['date_order'].'</td>';
            echo '	<td>'.$item['date_payment'].'</td>';
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

<?php
	//подключение подвала
	include 'temp/footer.php';
?>