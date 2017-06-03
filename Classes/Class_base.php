<?php 
session_start();
class Base 
{
	public $dlink;
	public $ERROR;//Ошибки в БД
	function __construct()
	{
		// Old connection to database
		$user='root';
		$host='localhost';
		$pas='';
		$this->dlink=mysql_connect($host,$user,$pas);
		if(!$this->dlink)
			$ERROR="Not have connect Base";else 
		mysql_select_db('kvark');
        //mysql_query("SET NAMES 'utf8';");
        //mysql_query("SET CHARACTER SET 'utf8';");
        //mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
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