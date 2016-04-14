<?php
abstract class Logger
{
	abstract public function writeLog($data);
}

class FileLogger extends Logger
{
	public function writeLog($data)
	{
		return true;
	}
}

class DatabaseLogger extends Logger
{
	public function writeLog($data)
	{
		return true;
	}
}

abstract class Factory
{
	abstract public function createLogger();
	abstract public function writeLog();
}

class FileLoggerFactory extends Factory 
{
	public function createLogger()
	{
		return new FileLogger;
	}

	public function writeLog()
	{
		$fileLogger = new FileLogger;
		$fileLogger->writeLog($data);
		return true;
	}
}

class DatabaseFactory extends Factory
{
	public function createLogger()
	{
		return new DatabaseLogger;
	}

	public function writeLog()
	{
		$fileLogger = new DatabaseLogger;
		$fileLogger->writeLog($data);
		return true;
	}
}

$filename = "./logger.json";
$contents = file_get_contents($filename);
$arr = json_decode($contents,1);
$factoryName = $arr['name'];
$factory = new $factoryName;
$write_res = $factory->writeLog('sss');
var_dump($write_res);

$fileLogger = $factory->createLogger();
$res = $fileLogger->writeLog('aaaa');
var_dump($res);
exit;
