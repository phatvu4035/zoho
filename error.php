<?php 

class CsException extends Exception
{
	protected $message = 'Error in testing';
}

$a = 2;
$b = 3;

function foo($a, $b)
{
	if($a !== $b) {
		throw new CsException();
	}
}

try {
	foo($a, $b);
} catch(CsException $e) {
	echo $e->getMessage();
}


?>