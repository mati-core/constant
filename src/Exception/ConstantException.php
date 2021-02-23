<?php

declare(strict_types=1);

namespace MatiCore\Core\Constant\Exception;


/**
 * Class ConstantException
 * @package MatiCore\Core\Constant\Exception
 */
class ConstantException extends \Exception
{

	/**
	 * @param string $name
	 * @param string $namespace
	 * @throws ConstantException
	 */
	public static function duplicateConstant(string $name, string $namespace): void
	{
		throw new self('Duplicated constant in database!' . "\n" . 'Namespace: ' . $namespace . "\n" . 'Name: ' . $name);
	}

	/**
	 * @param string $name
	 * @throws ConstantException
	 */
	public static function badConstantName(string $name):void
	{
		throw new self('Bad constant name char. Accept [a-Z_-] given: '.$name);
	}

	/**
	 * @param string $namespace
	 * @throws ConstantException
	 */
	public static function badConstantNamespace(string $namespace):void
	{
		throw new self('Bad constant name char. Accept [a-Z_-] given: '.$namespace);
	}

}