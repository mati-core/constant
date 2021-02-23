<?php

declare(strict_types=1);


namespace MatiCore\Core\Constant;


/**
 * Interface ConstantManagerAccessor
 * @package MatiCore\Core\Constant
 */
interface ConstantManagerAccessor
{

	/**
	 * @return ConstantManager
	 */
	public function get(): ConstantManager;

}