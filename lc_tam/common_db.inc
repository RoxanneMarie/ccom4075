<?php
$MYSQL_ERRNO = '';
$MYSQL_ERROR = '';

$new_win_width=600;
$new_win_height=400;

function html_header() {
	global $new_win_width,$new_win_height;
	?>
	<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="JavaScript" type="text/javascript">
	function open_window(url) {
		var NEW_WIN = null;
		NEW_WIN = window.open("","RecordViewer",
					"toolbar=no,width=" +
					<?php echo $new_win_width?>+
					",height=" + <?php echo $new_win_height?>+
					",directories=no,status=no,
					scrollbars=yes,resize=no,menubar=no");
		NEW_WIN.location.href = url;
	}
	</script>
	<title>Pantalla para Autenticar</title>
	</head>
	<body bgColor=#EBEBEB>
	<?php
}

function html_footer() {
?>
</body>
</html>
<?php
}

function sql_error(){
	global $MYSQL_ERRNO, $MYSQL_ERROR;

	if (empty($MYSQL_ERROR)){
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
	}
	return "$MYSQL_ERRNO: $MYSQL_ERROR";
}

function error_message($msg){
	html_header();
	echo "<script>alert(\"Error: $msg\");history.go(-1)</script>";
	html_footer();
	exit;
}
?>
