<?php
	
class Edebug
{
	private $error=array();
	
	public static function warning($text)
	{
		array_push($this->error['warning'],$text);
	}
	
	public static function fatal($text)
	{
		array_push($this->error['fatal'],$text);
	}
	
	public static function debug()
	{
		print_r($this->error);
	}
}
?>