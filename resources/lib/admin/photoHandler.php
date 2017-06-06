<?php

class PhotoHandler
{
	public $aleAsset;
	public $errors		= array();
	public $img_size	= array();
	public $img_temp	= array();
	public $ext		= array();
	public $img_url		= array();
	public $temp_imgs	= array();

	private $exts		= array("jpeg", "jpg", "png");

	public function __construct($aleAsset)
	{
		$this->aleAsset	= $aleAsset;
		$this->validateType();
		if (!empty($this->errors))
		{
			//print_r($this->errors); // Need better error handling. Prints errors to top of screen.
			throw new Exception('PhotoHandler construct failed.');
		}
	}

	public function moveFiles($track)
	{
		ini_set('memory_limit', '512M');
		switch ($track)
		{
			case 'emp':
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
				break;
			case 'aloe':
				break;
		}

	}

	public static function moveTempFiles($src, $track, $order = '')
	{
		ini_set('memory_limit', '512M');
		switch ($track)
		{
			case 'emp':

				break;
					
			case 'aloe':
				$asset = str_replace('images/temp_imgs/', '', $src);
				if (!empty($order)){
					//$asset .= "_$order";
					$arr = explode('.', $asset);
					$arr[0] = $arr[0] . "_$order";
					$asset	= $arr[0] . '.' . $arr[1];
				}
				rename($src, "images/ale_aloe/$asset");
				return "images/ale_aloe/$asset";
				break;
		}
	}

	public function resizeFiles($width, $height, $num = 0)
	{
		$i = $num;
		$k = 0;
		//echo '<pre>';
		//print_r($_FILES);
		//echo '</pre>';
		foreach ($_FILES['image']['tmp_name'] as $index => $tmp)
		{
			$img		= imagecreatefromjpeg($tmp);
			//$newTmp		= imagescale($img, $width, $height);
				
			if (getimagesize($tmp)[0] > getimagesize($tmp)[1]) // if width > height
			{
				$newTmp		= imagescale($img, 800, 600);
			} else {
				$newTmp		= imagescale($img, 600, 800);
			}
				
			$newTempPath	= "images/temp_imgs/" . $this->aleAsset . '_' . $i . '.' . $this->ext[$k];
				
			if (imagejpeg($newTmp, $newTempPath))
			{
				$this->temp_imgs[]	= $newTempPath;
				$i++;
				$k++;
			}
		}
	}

	private function validateType()
	{
		foreach ($_FILES['image']['name'] as $index => $name)
		{
			$ext	=	strtolower(end(explode('.', $name)));
			if (!in_array($ext, $this->exts))
			{
				$this->errors[]	= "Problem with uploaded image(s): File extension not allowed, please choose a JPEG or PNG file.";
				break;
			} else {
				$this->ext[] = $ext;
			}
		}
	}
}