<?php

class ImageProcess{
	public function createThumblnail($image,$path){
		
		$dir = "../uploads/";
		$file = $dir.$path."/".$image;
		$output = $dir.$path."/thumb/"."thumb_$image";
		
		$mime = getimagesize($file);
		$mime = explode("/", $mime['mime']);
		$mime = array_pop($mime);
		
		$create_image = "imagecreatefrom$mime";
		
		$original = $create_image($file);
		$original_width = imagesx($original);
		$original_height = imagesy($original);
		
		$long = ($original_height >= $original_width) ? $original_height : $original_width;
		$short = ($original_height <= $original_width) ? $original_height : $original_width;
		
		$width = $height = $short;
		$extra = $long - $short;
		
		if ($original_width > $original_height) {
			$x2 = $extra/2;
			$y2 = 0;
		} else {
			$x2 = 0;
			$y2 = $extra/2;
		}
		
		$new_canvas = imagecreatetruecolor($width, $height);
		
//		imagescale("", "","");
		
		imagecopy($new_canvas, $original, 0, 0, $x2, $y2, $width, $height);
		
		$new_image = "image$mime";
		
		$new_image($new_canvas, $output);
		
//		imagejpeg($new_canvas, $output);
//		imagepng("", "");
		
		imagedestroy($new_canvas);
		imagedestroy($original);
	}
}