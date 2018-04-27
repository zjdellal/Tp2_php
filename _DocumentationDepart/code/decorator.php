<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * provient de : http://jrgns.net/decorator-pattern-implemented-properly-in-php/
 */ 
abstract class Decorator
{
	protected $object; //The object to decorate

	
	function __construct( $object=null) // =null pour le class loader de CI
	{
		$this->object = $object;
	}
	
	/**
	 * transfert l'appel à la classe décorée
	 * @param unknown $method
	 * @param unknown $args
	 * @throws Exception Si la méthode appelée n'existe pas
	 * @return mixed le résultat de la fonction décorée
	 */
	public function __call($method, $args)
	{
		if ($object = $this->isCallable($method)) {
			$retVal= call_user_func_array(array($object, $method), $args);
			$this->decorate($method, $args, $retVal);
			return 	$retVal;
		}
		throw new Exception(
				'Undefined method - ' . get_class($this->getOriginalObject()) . '::' . $method
		);
	}
	
	public function __get($property)
	{
		$object = $this->getOriginalObject();
		if (property_exists($object, $property)) {
			return $object->$property;
		}
		return null;
	}
	
	public function __set($property, $value)
	{
		$object = $this->getOriginalObject();
		$object->$property = $value;
		return $this;
	}
	
	public function getOriginalObject()
	{
		$object = $this->object;
		while ($object instanceof Decorator) {
			$object = $object->getOriginalObject();
		}
		return $object;
	}
	
	public function isCallable($method, $checkSelf = false)
	{
		//Check the original object
		$object = $this->getOriginalObject();
		if (is_callable(array($object, $method))) {
			return $object;
		}
		//Check Decorators
		$object = $checkSelf ? $this : $this->object;
		while ($object instanceof Decorator) {
			if (is_callable(array($object, $method))) {
				return $object;
			}
			$object = $this->object;
		}
		return false;
	}
	
	/**
	 * Cette méthode fournit le comportement qui décore la classe.
	 * @param unknown $method la méthode qui est appelée
	 * @param unknown $args les arguments fournis
	 */
	abstract public function decorate($method, $args, &$retVal);

}


/* End of file Someclass.php */
