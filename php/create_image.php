<?php

function ImageRotateRightAngle( $imgSrc, $angle )
{
    // ensuring we got really RightAngle (if not we choose the closest one)
    $angle = min( ( (int)(($angle+45) / 90) * 90), 270 );

    // no need to fight
    if( $angle == 0 )
        return( $imgSrc );

    // dimenstion of source image
    $srcX = imagesx( $imgSrc );
    $srcY = imagesy( $imgSrc );

    switch( $angle )
        {
        case 90:
            $imgDest = imagecreatetruecolor( $srcY, $srcX );
            for( $x=0; $x<$srcX; $x++ )
                for( $y=0; $y<$srcY; $y++ )
                    imagecopy($imgDest, $imgSrc, $srcY-$y-1, $x, $x, $y, 1, 1);
            break;

        case 180:
            $imgDest = ImageFlip( $imgSrc, IMAGE_FLIP_BOTH );
            break;

        case 270:
            $imgDest = imagecreatetruecolor( $srcY, $srcX );
            for( $x=0; $x<$srcX; $x++ )
                for( $y=0; $y<$srcY; $y++ )
                    imagecopy($imgDest, $imgSrc, $y, $srcX-$x-1, $x, $y, 1, 1);
            break;
        }

    return( $imgDest );
} 


// function created by www.thewebhelp.com

if(!function_exists("create_image")){
	function create_image($original_file, $destination_file=NULL, $max_size = 96, $rotate, $square = false) {


		// load the image
		$original_image_raw = imagecreatefromjpeg($original_file);
		if ($rotate > 0) {
			$original_image = ImageRotateRightAngle($original_image_raw, $rotate);
		}
		else {
			$original_image = $original_image_raw;
		}
		

		// get width and height of original image
		$original_width = imagesx($original_image);	
		$original_height = imagesy($original_image);	
		
		if ($square == true) {
			if($original_width > $original_height){
				$new_height = $max_size;
				$new_width = $new_height*($original_width/$original_height);
			}
			if($original_height > $original_width){
				$new_width = $max_size;
				$new_height = $new_width*($original_height/$original_width);
			}
			if($original_height == $original_width){
				$new_width = $max_size;
				$new_height = $max_size;
			}			
		}
		else {
			if($original_width > $original_height){
				$new_width = $max_size;
				$new_height = ($original_height*$new_width)/$original_width;
			}
			if($original_height >= $original_width){
				$new_height = $max_size;
				$new_width = ($original_width*$new_height)/$original_height;
			}
		}

		
		$new_width = round($new_width);
		$new_height = round($new_height);
		
		
		if ($square == true) {
			$smaller_image = imagecreatetruecolor($new_width, $new_height);
			$square_image = imagecreatetruecolor($max_size, $max_size);
			
			imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
			
			if($new_width>$new_height){
				$difference = $new_width-$new_height;
				$half_difference =  round($difference/2);
				imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $max_size+$difference, $max_size, $new_width, $new_height);
			}
			if($new_height>$new_width){
				$difference = $new_height-$new_width;
				$half_difference =  round($difference/2);
				imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $max_size, $max_size+$difference, $new_width, $new_height);
			}
			if($new_height == $new_width){
				imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $max_size, $max_size, $new_width, $new_height);
			}

			imagedestroy($smaller_image);
		}
		else {
			$square_image = imagecreatetruecolor($new_width, $new_height);
			imagecopyresampled($square_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
		}
		
		// save the smaller image FILE if destination file given
		if(substr_count(strtolower($destination_file), ".jpg") || substr_count(strtolower($destination_file), ".jpeg")){
			imagejpeg($square_image,$destination_file,100);
		}

		imagedestroy($original_image);
		imagedestroy($square_image);

	}
}


?>
