<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DbConnectionUtil.php';
	$status = $_POST['astatus'];
	$class = $_POST['acls'];
	
	if($status == 1){
		?>
			<a href="javascript:void(0)" title="" onclick="return abc('0', '<?php echo $class; ?>')">
				<img src="/template/admin/assets/img/deactive.gif" alt=""/>
			</a>
		<?php
		$query = "UPDATE news SET status = 0 WHERE id = {$class}";
	}
	else if($status == 0){
		?>
			<a href="javascript:void(0)" title="" onclick="return abc('1', '<?php echo $class; ?>')">
				<img src="/template/admin/assets/img/active.gif" alt=""/>
			</a>
		<?php
		$query = "UPDATE news SET status = 1 WHERE id = {$class}";
	}
	$result = $mysqli->query($query);
?>