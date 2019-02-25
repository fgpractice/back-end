<!-- начало макета head-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Главная</title>
	<meta charset="utf-8">
	<!-- указываем стили в файле css -->
	<link rel = "stylesheet" href = "<?=base_url()?>assets/css/style.css" type = "text/css">
	<link rel = "stylesheet" href = "<?=base_url()?>assets/css/bootstrap.min.css" type = "text/css">
	<link href="<?=base_url()?>assets/css/addons/datatables.min.css" rel="stylesheet">
	<!-- указываем скрипты в файле js -->
	<script text = "java/script" src = "<?=base_url()?>assets/js/jquery-3.0.0.min.js"></script>
	<script text = "java/script" src = "<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/addons/datatables.min.js"></script>
	<script>
    	$(document).ready(function () {
        $('#table').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });
    </script>
</head>

<body>
<!-- конец макета head-->