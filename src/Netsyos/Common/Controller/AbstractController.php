<?php
namespace Netsyos\Common\Controller;

use Doctrine\ORM\Query;
use Netsyos\Common\Initializer\EntityManagerAwareInterface;
use Zend\Mvc\Controller\AbstractActionController;

class AbstractController extends AbstractActionController implements EntityManagerAwareInterface
{
    /**
     * @var string
     */
    protected $baseNameSpace = '';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * @param string $baseNameSpace
     * @return mixed|void
     */
    public function setBaseNameSpace($baseNameSpace)
    {
        $this->baseNameSpace = $baseNameSpace;
    }

    /**
     * @return string
     */
    public function getBaseNameSpace()
    {
        return $this->baseNameSpace;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @return mixed
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param $entity
     * @param bool $namespace
     * @return \Netsyos\Common\Repository\EntityRepository
     */
    public function getRepository($entity, $namespace = false)
    {
        return $this->em->getRepository(($namespace ? $namespace : $this->baseNameSpace) . $entity);
    }
}