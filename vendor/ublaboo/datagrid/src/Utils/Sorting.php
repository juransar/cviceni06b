<?php

/**
 * @copyright   Copyright (c) 2015 ublaboo <ublaboo@paveljanda.com>
 * @author      Pavel Janda <me@paveljanda.com>
 * @package     Ublaboo
 */

namespace Ublaboo\DataGrid\Utils;

use Nette;

final class Sorting extends Nette\Object
{

	/**
	 * @var array
	 */
	private $sort = [];

	/**
	 * @var callable|null
	 */
	private $sort_callback = NULL;


	public function __construct(array $sort, callable $sort_callback = NULL)
	{
		$this->sort = $sort;
		$this->sort_callback = $sort_callback;
	}


	/**
	 * @return array
	 */
	public function getSort()
	{
		return $this->sort;
	}


	/**
	 * @return callable|null
	 */
	public function getSortCallback()
	{
		return $this->sort_callback;
	}

}
