<?php

namespace Hitmeister\Component\Api;

use Hitmeister\Component\Api\Namespaces\AttributesNamespace;
use Hitmeister\Component\Api\Namespaces\CategoriesNamespace;
use Hitmeister\Component\Api\Namespaces\StatusNamespace;
use Hitmeister\Component\Api\Transport\Transport;

/**
 * Class Client
 *
 * @category PHP-SDK
 * @package  Hitmeister\Component\Api
 * @author   Maksim Naumov <maksim.naumov@hitmeister.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://www.hitmeister.de/api/v1/
 */
class Client
{
	const VERSION = 'development';

	/** @var Transport */
	private $transport;

	/** @var AttributesNamespace */
	private $attributesNs;

	/** @var CategoriesNamespace  */
	private $categoriesNs;

	/** @var StatusNamespace */
	private $statusNs;

	/**
	 * @param Transport $transport
	 */
	public function __construct(Transport $transport)
	{
		$this->transport = $transport;

		// Namespaces
		$this->attributesNs = new AttributesNamespace($this->transport);
		$this->categoriesNs = new CategoriesNamespace($this->transport);
		$this->statusNs = new StatusNamespace($this->transport);
	}

	/**
	 * @return Transport
	 */
	public function getTransport()
	{
		return $this->transport;
	}

	/**
	 * @return AttributesNamespace
	 */
	public function attributes()
	{
		return $this->attributesNs;
	}

	/**
	 * @return CategoriesNamespace
	 */
	public function categories()
	{
		return $this->categoriesNs;
	}

	/**
	 * @return StatusNamespace
	 */
	public function status()
	{
		return $this->statusNs;
	}
}