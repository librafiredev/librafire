<?php
/**
 * Created by PhpStorm.
 * User: LibraFire 2
 * Date: 3/23/2018
 * Time: 10:31 AM
 */


$output_dir = CUSTOM_UPLOAD_FILE_PATH;
if ( isset( $_POST["op"] ) && $_POST["op"] == "delete" && isset( $_POST['name'] ) ) {
	$fileName = $_POST['name'];
	$fileName = str_replace( "..", ".", $fileName );
	$filePath = $output_dir . $fileName;
	if ( file_exists( $filePath ) ) {
		unlink( $filePath );
	}
	echo "Deleted File " . $fileName . "<br>";
}