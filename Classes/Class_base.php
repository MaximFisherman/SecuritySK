<?php 
session_start();
class Base 
{
	public $dlink;
	public $ERROR;//Ошибки в БД
	function __construct()
	{
		$user='root';
		$host='localhost';
		$pas='';
		$this->dlink=mysql_connect($host,$user,$pas);
		if(!$this->dlink)
			$ERROR="Not have connect Base";else 
		mysql_select_db('kvark');
	}


    function __destruct ()
	{
		mysql_close($this->dlink);
	}
	
	function view_eror()
	{
	echo ($this->ERROR);
	}
}
?>