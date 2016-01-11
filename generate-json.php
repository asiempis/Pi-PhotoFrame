<?php
	$str = file_get_contents('images.json');
	$json = json_decode($str, true);
	$image_dir = "assets/slides";
	$stat = stat($image_dir);
   	if ($stat['mtime'] != $json[0]){
		$image_relative_path = 'assets/slides'; // path to images relative to script
		$file_types = array('jpg', 'jpeg', 'gif', 'png');
		$json_array = array();
		if ($handle = opendir($image_dir)) {
			$json_Array[] = array('modtime'=>$stat['mtime']);
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					$ext_bits = explode(".", $file); // finds file extensions
					foreach ($ext_bits as $key => $value) {
						if(in_array($value,$file_types)){
							$url =$image_relative_path . "/" . $file;
							$json_Array[] = array('url'=>$url);
						}
					}
				}
			}
			closedir($handle);
		}
		$fp = fopen('images.json', 'w');
		fwrite($fp, json_encode($json_Array));
		fclose($fp);
	}
?>