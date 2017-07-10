<?php

class PhotoHandler
{
	public 	$aleAsset;
	public 	$errors			= array();
	public 	$ext			= array();
	public 	$img_url		= array();
	public 	$temp_imgs		= array();
	public	$photos			= array();
	public 	$count;
	private	$conn;

	private $exts		= array("jpeg", "jpg", "png");

	public function __construct($aleAsset, $conn)
	{
		$this->conn	=	$conn;
		if (is_numeric($aleAsset))
		{
			$this->aleAsset	= (int) $aleAsset;
		} else {
			throw new Exception('Invalid ALE Asset: Must be an integer.');
		}
		$this->validateType();
		$this->setCount();
// 		$this->setPhotos();
		if (!empty($this->errors))
		{
			$message	=	'';
			foreach ($this->errors as $err)
			{
				$message	.=	$err . "\n";
			}
			throw new Exception($message);
		}
	}

	public function importPhotos()
	{
		/* See $this->count++
		 * If count is zero, name the first image with a suffix of '1'
		 * If the count is, for example, 6, then there are 6 photos already in the file system, the last
		 * of which is suffixed with a '6'.
		 */
		$k = 0;
		foreach ($_FILES['image']['tmp_name'] as $index => $path)
		{
			$img	=	$this->resizePhoto($path);
			$tmp	=	$this->getNewTempPath($k);
			$k++;
			try {
				// Try to save the image to the new path.
				if (imagejpeg($img, $tmp))
				{
					$this->temp_imgs[]	= $tmp;
				} else {
					throw new Exception('Could not save ');
				}
			} catch (Exception $e) {
				$this->errors[]	=  $e->getMessage() . $_FILES['image']['name'][$index] . '.';
			}
		}
		$q	=	"UPDATE itemlist SET img_count = $this->count WHERE aleAsset = $this->aleAsset";
		$r	=	db_query($q, $this->conn);
	}
	
	public function moveFiles($track)
	{
// 		ini_set('memory_limit', '512M');
		$i = 0;
		foreach ($_FILES['image']['tmp_name'] as $index => $tmp)
		{
			$testImg	= imagecreatefromjpeg($tmp);
				
			if (getimagesize($tmp)[0] > getimagesize($tmp)[1]) // if width > height
			{
				$newTmp		= imagescale($testImg, 800, 600);
			} else {
				$newTmp		= imagescale($testImg, 600, 800);
			}
				
			if (imagejpeg($newTmp, "images/" . $this->aleAsset . '.' . $this->ext[$i]))
			{
				$this->img_url[] = "images/" . $this->aleAsset . '.' . $this->ext[$i];
				$i++;
			} else {

			}
			//echo getimagesize($this->img_url[0])[0]; // width
			//echo getimagesize($this->img_url[0])[1]; // height
			//move_uploaded_file($tmp, "images/" . $this->aleAsset . '.' . $this->ext[$i]);
			//$this->img_url[] = "images/" . $this->aleAsset . '.' . $this->ext[$i];
			//$i++;
		}
	}

	public static function movePhotos($src, $from, $to)
	{
// 		ini_set('memory_limit', '512M');
		$path		=	str_replace($from, $to, $src);
		if (rename($src, $path))
		{
			return $path;
		} else {
			throw new Exception('Could not move photo.');
		}
	}
	
	public static function deletePhotoRecord($asset, $id, &$conn)
	{
		$q		=	"DELETE FROM item_photos WHERE id=? AND aleAsset=?";
		$stmt	=	$conn->prepare($q);
		if ($stmt === false)
		{
			throw new Exception('Photo Delete: prepare() failed: ' . htmlspecialchars($conn->error));
		}
		// Bind Parameters
		$rc		=	$stmt->bind_param('ii', $id, $asset);
		if ($rc === false)
		{
			throw new Exception('Photo Delete: bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc		=	$stmt->execute();
		if ($rc === false)
		{
			throw new Exception('Photo Delete: execute() failed: ' . htmlspecialchars($stmt->error));
		}
	}

	private function resizePhoto($path, $width = 800, $height = 600)
	{
		// Create the resource
		$img		= imagecreatefromjpeg($path);
		// Test for orientation and resize accordingly.
		if (getimagesize($path)[0] > getimagesize($path)[1]) // if width > height
		{
			$img		= imagescale($img, $width, $height);
		} else {
			$img		= imagescale($img, $height, $width);
		}
		return $img;
	}
	
	private function getNewTempPath($i)
	{
		// Build the image's new path - to be stored in the temp folder until confirmed by the user.
		$this->count++;
		$newTempPath	= "img/temp_imgs/" . $this->aleAsset . '_' . $this->count . '.' . $this->ext[$i];
		return $newTempPath;
	}
	
	private function validateType()
	{
		if (empty($_FILES['image'])) 
		{
			$this->errors[]	= "File extension not allowed, please choose a JPEG or PNG file.";
		} else {
			foreach ($_FILES['image']['name'] as $index => $name)
			{
				$pieces	=	explode('.', $name);
				$ext	=	strtolower(end($pieces));
				if (!in_array($ext, $this->exts))
				{
					$this->errors[]	= "File extension not allowed, please choose a JPEG or PNG file.";
					break;
				} else {
					$this->ext[] = $ext;
				}
			}
		}
	}
	
	private function setCount()
	{
		$q	=	"SELECT img_count FROM itemlist WHERE aleAsset=$this->aleAsset";
		$r	=	db_query($q, $this->conn);
		$r->data_seek(0);
		$row=	$r->fetch_array(MYSQLI_ASSOC);
		$this->count	=	(int) $row['img_count'];
	}
	
// 	private function setPhotos()
// 	{
// 		foreach ($_FILES['image']['tmp_name'] as $index => $path)
// 		{
// 			$this->photos[$index]	=	array(	'name'	=>	$_FILES['image']['name'][$index],
// 												'type'	=>	$_FILES['image']['type'][$index]
// 			);
// 		}
// 	}
}