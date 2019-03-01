<!-- head-->
<?=doctype('html4-trans')?>
<html lang="ru">
<head>
	<!-- meta -->
	<?=meta('Content-Type','text/html; charset=Windows-1251')?>
	<?=meta(array('name' => 'Description', 'content' => 'internet-frigate'))?>
	<?=meta(array('name' => 'Keywords', 'content' => 'internet'))?>
	<!-- /meta -->
	<title>Главная</title>
	<!-- css -->
	<link rel="stylesheet" href = "<?=base_url()?>assets/css/style.css" type="text/css">
	<link rel="stylesheet" href = "<?=base_url()?>assets/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/addons/datatables.min.css" type="text/css">
	<!-- /css -->
	<!-- js -->
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/addons/datatables.min.js"></script>
	<script>
    	$(document).ready(function () {
        $('.table').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });
	</script>
	<!-- /js -->
</head>
<!-- /head-->
<!-- body-->
<body>
