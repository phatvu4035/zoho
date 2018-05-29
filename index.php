<?php 

class Foo
{
	public function speak()
	{
		echo 'Speak Foo';
	}
}


class Bar
{
	public function write()
	{
		echo 'Write here';
	}
}

class Stripe
{
	protected $foo;

	protected $bar; 

	public function __construct(Foo $foo, Bar $bar)
	{
		$this->foo = $foo;
		$this->bar = $bar;
	}

	public function index()
	{
		echo 'Hello';
	}
}

$reflection = new \ReflectionClass('Stripe');

echo '<prev>'. var_dump($reflection->getMethods()[0]->getParameters()[0]->getClass()->getName()) . '</prev>';

interface BaseIn
{
	public function abc();

	public function dfe();

	public function fgh();

}

class ImpBase1
{
	protected static $instance;

	public static function getInstance()
	{
		if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
	}

	public function abc()
	{
		echo 'ABC';
	}

	public function dfe()
	{
		echo 'DEF';
	}

	public function fgh()
	{
		echo 'FGH';
	}
}

class AppBase extends ImpBase1
{
	public function __construct()	
	{
		echo 'AppBase';
	}

	public function ext()
	{
		echo 'Ext';
	}
}


?>