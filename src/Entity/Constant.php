<?php

declare(strict_types=1);

namespace MatiCore\Constant;


use Baraja\Doctrine\UUID\UuidIdentifier;
use Doctrine\ORM\Mapping as ORM;
use Nette\SmartObject;
use Nette\Utils\DateTime;

/**
 * Class Constant
 * @package MatiCore\Constant
 * @ORM\Entity()
 * @ORM\Table(name="core__constant")
 */
class Constant
{

	public const DEFAULT_NAMESPACE = 'root';
	
	use SmartObject;
	use UuidIdentifier;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private string $namespace = self::DEFAULT_NAMESPACE;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private string $name;

	/**
	 * @var string|null
	 * @ORM\Column(type="text", nullable=true)
	 */
	private string|null $value;

	/**
	 * @var \DateTime
	 * @ORM\Column(type="datetime")
	 */
	private \DateTime $createdDate;

	/**
	 * @var \DateTime
	 * @ORM\Column(type="datetime")
	 */
	private \DateTime $updatedDate;

	/**
	 * Constant constructor.
	 * @param string $name
	 * @param string|null $value
	 * @throws \Exception
	 */
	public function __construct(string $name, ?string $value = null)
	{
		$this->name = $name;
		$this->value = $value;
		
		$this->createdDate = DateTime::from('NOW');
		$this->updatedDate = DateTime::from('NOW');
	}

	/**
	 * @return string
	 */
	public function getNamespace(): string
	{
		return $this->namespace;
	}

	/**
	 * @param string $namespace
	 */
	public function setNamespace(string $namespace): void
	{
		$this->namespace = $namespace;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @return string|null
	 */
	public function getValue(): ?string
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 */
	public function setValue(?string $value): void
	{
		$this->value = $value;
	}

}