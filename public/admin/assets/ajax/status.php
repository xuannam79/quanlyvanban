<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/function/db_connect.php';
	$status = $_POST['astatus'];
	$class = $_POST['acls'];
	
	if($status == 1){
		?>
			<a href="javascript:void(0)" title="" onclick="return getStatus(0, '<?php echo $class; ?>')">
				<img src="/template/admin/assets/img/deactive.gif" alt=""/>
			</a>
		<?php
		$query = "UPDATE cat SET status = 0 WHERE cat_id = {$class}";
	}
	else if($status == 0){
		?>
			<a href="javascript:void(0)" title="" onclick="return getStatus(1, '<?php echo $class; ?>')">
				<img src="/template/admin/assets/img/active.gif" alt=""/>
			</a>
		<?php
		$query = "UPDATE cat SET status = 1 WHERE cat_id = {$class}";
	}
	$result = $mysqli->query($query);
?>