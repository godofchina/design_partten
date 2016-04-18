<?
interface Product
{
	public function setName($name);
	public function getName();
}

class PruductA implements Product
{
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

class PruductB implements Product
{
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

class FileHandler
{
	public function readFile($fileName)
	{
		return file_get_contents($fileName);
	}

	public function writeFile($filename, $contents)
	{

	}
}

class CompleteFactory
{
	public static function createProduct($productName)
	{
		switch ($productName) {
			case 'A':
				return new PruductA;
				break;
			case 'B':
				return new ProductB;
				break;
			default:
				# code...
				break;
		}
	}
}

$fileHandler = new FileHandler;
$contents = $fileHandler->readFile('./product.json');
$productInfo = json_decode($contents,1);

if ( !$productInfo['name'] )
	echo 'whoops';
$product = CompleteFactory::createProduct($productInfo['name']);
$product->setName("二蛋"); //such a great name ha
echo $product->getName();

exit;