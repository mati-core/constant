<?php

declare(strict_types=1);


namespace MatiCore\Constant;


/**
 * Interface ConstantManagerAccessor
 * @package MatiCore\Constant
 */
interface ConstantManagerAccessor
{

	/**
	 * @return ConstantManager
	 */
	public function get(): ConstantManager;

}