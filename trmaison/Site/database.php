<?php
class Database
{
	
		private static $dbHost = "localhost";
		private static $dbName = "trmaison";
		private static $dbUser = "root";
		private static $dbUserPassword = "";
		private static $connection = null;
		
	public static function connect()
	{
		try
		{
			$connection = new PDO("mysql:host=localhost;dbname=trmaison","root","");
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $connection;
	}
	public static function disconnect()
	{
			$connection=null;
	}
}

?>