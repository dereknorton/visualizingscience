<?php
	
	$files = glob('/exhibit_upload/exhibit_images/*.{jpg,tif,tiff,TIF,TIFF,JPG,JPEG}', GLOB_BRACE);
	foreach($files as $file){
		$thumb = new Imagick($file);
		$thumb->setImageFormat('png');
		$thumb->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
		$thumb->setImageResolution(52,52);
		$thumb->scaleImage(350, 350, true);

		$thumb->writeImage("/exhibit_upload/web_safe_images/".basename(str_replace(array(".jpg",".tif",".tiff",".TIF",".TIFF",".JPG",".JPEG"),"",$file)).".png");
		$thumb->destroy();
	}
