<?php
namespace Netsyos\Common\Service;

use Netsyos\Common\Initializer\LoggerAwareInterface;
use Netsyos\Common\Initializer\EntityManagerAwareInterface;
use Zend\Di\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Doctrine\ORM\Query;

class AbstractService implements ServiceLocatorAwareInterface, EntityManagerAwareInterface, LoggerAwareInterface
{
    /**
     * @var string
     */
    protected $baseNameSpace = '';

    /**
     * Service locator
     *
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var \Zend\Log\Logger
     */
    protected $logger;

    /**
     * @param string $baseNameSpace
     * @return mixed|void
     */
    public function setBaseNameSpace($baseNameSpace = false)
    {
        if (!$baseNameSpace) {
            $class = explode('\\', get_class($this));
            unset($class[count($class) - 1]);
            unset($class[count($class) - 1]);
            $this->baseNameSpace = implode('\\', $class) . '\Entity\\';
        } else {
            $this->baseNameSpace = $baseNameSpace;
        }
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
        return $this->entityManager->getRepository(($namespace ? $namespace : $this->baseNameSpace) . $entity);
    }

    /**
     * Set the service locator.
     *
     * @param  \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return AbstractHelper
     */
    public function setServiceLocator(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * Get the service locator.
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * @param \Zend\Log\Logger $logger
     */
    public function setLogger(\Zend\Log\Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return \Zend\Log\Logger
     */
    public function getLogger()
    {
        return $this->logger;
    }
}
