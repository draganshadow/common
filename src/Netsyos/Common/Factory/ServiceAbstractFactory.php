<?php
namespace Netsyos\Common\Factory;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceAbstractFactory implements AbstractFactoryInterface
{
    /**
     * @return string
     */
    public abstract function getBaseNamespace();

    public function canCreateServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        if (class_exists($this->getBaseNamespace() . $requestedName . 'Service')){
            return true;
        }
        return false;
    }

    public function createServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $class = $this->getBaseNamespace() . $requestedName .'Service';
        return new $class;
    }
}