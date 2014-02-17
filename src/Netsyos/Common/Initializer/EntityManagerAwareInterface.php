<?php
namespace Netsyos\Common\Initializer;

interface EntityManagerAwareInterface
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager();

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @return mixed
     */
    public function setEntityManager($entityManager);

    /**
     * @return string
     */
    public function getBaseNameSpace();

    /**
     * @param string $namespace
     * @return mixed
     */
    public function setBaseNameSpace($namespace);

    /**
     * @param $entity
     * @param bool $namespace
     * @return \Netsyos\Common\Repository\EntityRepository
     */
    public function getRepository($entity, $namespace = false);
}
