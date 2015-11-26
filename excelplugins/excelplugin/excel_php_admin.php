<?php
if ($_POST ['excelphp_hidden'] == 'Y') {
	// Form data sent
	$dbhost = $_POST ['excelphp_dbhost'];
	update_option ( 'excelphp_dbhost', $dbhost );
	
	$dbname = $_POST ['excelphp_dbname'];
	update_option ( 'excelphp_dbname', $dbname );
	
	$dbuser = $_POST ['excelphp_dbuser'];
	update_option ( 'excelphp_dbuser', $dbuser );
	
	$dbpwd = $_POST ['excelphp_dbpwd'];
	update_option ( 'excelphp_dbpwd', $dbpwd );
	
	$prod_img_folder = $_POST ['excelphp_prod_xls_folder'];
	update_option ( 'excelphp_prod_xls_folder', $prod_img_folder );
	
	?>
<div class="updated">
	<p>
		<strong><?php _e('Options saved.' ); ?></strong>
	</p>
</div>
<?php
} else {
	// Normal page display
	$dbhost = get_option ( 'excelphp_dbhost' );
	$dbname = get_option ( 'excelphp_dbname' );
	$dbuser = get_option ( 'excelphp_dbuser' );
	$dbpwd = get_option ( 'excelphp_dbpwd' );
	$prod_img_folder = get_option ( 'excelphp_prod_xls_folder' );
}
?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'Php Excel Database Configuration Options', 'excelphp_trdom' ) . "</h2>"; ?>

    <form name="excelphp_form" method="post"
		action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="excelphp_hidden" value="Y">
        <?php    echo "<h4>" . __( 'Database credentials', 'excelphp_trdom' ) . "</h4>"; ?>
        <p><?php _e("Database host: " ); ?><input type="text"
				name="excelphp_dbhost" value="<?php echo $dbhost; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>
		<p><?php _e("Database name: " ); ?><input type="text"
				name="excelphp_dbname" value="<?php echo $dbname; ?>" size="20"><?php _e(" ex: bd_excel" ); ?></p>
		<p><?php _e("Database user: " ); ?><input type="text"
				name="excelphp_dbuser" value="<?php echo $dbuser; ?>" size="20"><?php _e(" ex: root" ); ?></p>
		<p><?php _e("Database password: " ); ?><input type="text"
				name="excelphp_dbpwd" value="<?php echo $dbpwd; ?>" size="20"><?php _e(" ex: 1234" ); ?></p>
      

		<p class="submit">
			<input type="submit" name="Submit"
				value="<?php _e('Update Options', 'excelphp_trdom' ) ?>" />
		</p>
	</form>

	<br />

	<br />
	<hr />
	<h2>XLS Upload Form</h2>
	<?php
	echo contact_form_markup ();
	?>
	<hr />

	<h2>XLS Files in upload dir</h2>
	<form>
	<select name="xlsfile">
	<?php
	$upload_dir = wp_upload_dir ();
// 	print_r ( $upload_dir );
	$handle = opendir ( $upload_dir ['path'] );
	while ( false !== ($entry = readdir ( $handle )) ) {
		if ($entry) {
			if (strpos ( $entry, '.xls' ) !== false || strpos ( $entry, '.xlsx' ) !== false) {
				echo '<option value="'.$entry.'">' . $entry.'</option>';
			}
		}
	}
	
	?>
	</select>
	<input type="hidden" name="page" value="EXCEL_Php_Worksheets"/>
	<input type="submit" value="Display XLS Info"/>
	
	
	</form>
	
	
	<?php 
	
		// process XLS file upload
		
		if(isset($_REQUEST['xlsfile'])){
			$xlsfile = $_REQUEST['xlsfile'];
			//$upload_dir
			$xlsfile_path = $upload_dir ['path'].'/'.$xlsfile;
			echo 'PATH: '.$xlsfile_path.'<br/>';
			
			// get titles from XLS file
			$titluri = getTitles(); // from 001ReadExcel.php
			
			echo '<form>';
			$columnIndex = 0;
			foreach($titluri as $titlu){
				echo '<input type="checkbox" name = "xlscolumn[]" value="'.$columnIndex.'">'.$titlu.'</input><br/>';
			}
			echo '<input type="hidden" name="page" value="EXCEL_Php_Worksheets"/>';
			echo '<input type="submit" value="Preview"/>';
			echo '</form>';
		}
	?>
	
	<?php 
		// display required fields
		echo 'START<br/>';
		print_r($_REQUEST['xlscolumn']);
		echo 'END<br/>';
		if(isset($_REQUEST['xlscolumn'])){
			$checkedColumn = $_REQUEST['xlscolumn'];
			$as = getSheetAsArray();
			
			$titleRow = $as[1];
			echo 'TITLE ROW: <br/>';
			print_r($titleRow);
			echo '<br/><br/>';
			echo '<table>';
			foreach($titleRow as $titleColumn){
				
			}
			echo '</table>'
			?>
			
			
			
			<?php 
			
			print_r($as);
		}
		
	?>
	
</div>
