<?php

declare(strict_types=1);


namespace MatiCore\Core\Constant;

use Baraja\Doctrine\EntityManager;
use Baraja\Doctrine\EntityManagerException;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use MatiCore\Core\Constant\Exception\ConstantException;

/**
 * Class ConstantManager
 * @package MatiCore\Core\Constant
 */
class ConstantManager
{

	/**
	 * @var EntityManager
	 */
	private EntityManager $entityManager;

	/**
	 * @var array<Constant>
	 */
	private array $temp;

	/**
	 * ConstantManager constructor.
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @param string $name
	 * @param string $namespace
	 * @return string|null
	 * @throws ConstantException
	 * @throws EntityManagerException
	 */
	public function get(string $name, string $namespace = Constant::DEFAULT_NAMESPACE): ?string
	{
		$this->validateInput($name, $namespace);
		$key = $this->getKey($name, $namespace);

		$constant = $this->temp[$key] ?? $this->load($name, $namespace);

		return $constant->getValue();
	}

	/**
	 * @param string $name
	 * @param string $namespace
	 * @return string
	 */
	private function getKey(string $name, string $namespace): string
	{
		return $namespace . '--' . $name;
	}

	/**
	 * @param string $name
	 * @param string $namespace
	 * @return Constant
	 * @throws ConstantException
	 * @throws EntityManagerException
	 */
	private function load(string $name, string $namespace): Constant
	{
		$constant = null;

		try {
			$constant = $this->entityManager->getRepository(Constant::class)
				->createQueryBuilder('c')
				->select('c')
				->where('c.name = :name')
				->andWhere('c.namespace = :namespace')
				->setParameter('name', $name)
				->setParameter('namespace', $namespace)
				->getQuery()
				->getSingleResult();
		} catch (NoResultException $e) {
			$constant = new Constant($name, null);
			$constant->setNamespace($namespace);

			$this->entityManager
				->persist($constant)
				->flush($constant);
		} catch (NonUniqueResultException $e) {
			ConstantException::duplicateConstant($name, $namespace);
		}

		$key = $this->getKey($name, $namespace);
		$this->temp[$key] = $constant;

		return $constant;
	}

	/**
	 * @param string $name
	 * @param string|null $value
	 * @param string $namespace
	 * @throws ConstantException
	 * @throws EntityManagerException
	 */
	public function set(string $name, ?string $value = null, string $namespace = Constant::DEFAULT_NAMESPACE): void
	{
		$this->validateInput($name, $namespace);
		$key = $this->getKey($name, $namespace);

		$constant = $this->temp[$key] ?? $this->load($name, $namespace);
		$constant->setValue($value);

		$this->entityManager->flush($constant);
	}

	/**
	 * @param string $name
	 * @param string $namespace
	 * @throws ConstantException
	 */
	private function validateInput(string $name, string $namespace): void
	{
		if(!preg_match('/^[a-zA-Z\-_]+$/', $name)){
			ConstantException::badConstantName($name);
		}

		if(!preg_match('/^[a-zA-Z\-_]+$/', $namespace)){
			ConstantException::badConstantNamespace($namespace);
		}
	}
}