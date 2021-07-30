<?php

namespace ContainerL81HCJb;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderb03c2 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializere0eb8 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties4f7d5 = [
        
    ];

    public function getConnection()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getConnection', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getMetadataFactory', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getExpressionBuilder', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'beginTransaction', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->beginTransaction();
    }

    public function getCache()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getCache', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getCache();
    }

    public function transactional($func)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'transactional', array('func' => $func), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->transactional($func);
    }

    public function commit()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'commit', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->commit();
    }

    public function rollback()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'rollback', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getClassMetadata', array('className' => $className), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'createQuery', array('dql' => $dql), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'createNamedQuery', array('name' => $name), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'createQueryBuilder', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'flush', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'clear', array('entityName' => $entityName), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->clear($entityName);
    }

    public function close()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'close', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->close();
    }

    public function persist($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'persist', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'remove', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'refresh', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'detach', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'merge', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getRepository', array('entityName' => $entityName), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'contains', array('entity' => $entity), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getEventManager', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getConfiguration', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'isOpen', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getUnitOfWork', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getProxyFactory', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'initializeObject', array('obj' => $obj), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'getFilters', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'isFiltersStateClean', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'hasFilters', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return $this->valueHolderb03c2->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializere0eb8 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderb03c2) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderb03c2 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderb03c2->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__get', ['name' => $name], $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        if (isset(self::$publicProperties4f7d5[$name])) {
            return $this->valueHolderb03c2->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb03c2;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderb03c2;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__set', array('name' => $name, 'value' => $value), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb03c2;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderb03c2;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__isset', array('name' => $name), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb03c2;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderb03c2;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__unset', array('name' => $name), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderb03c2;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderb03c2;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__clone', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        $this->valueHolderb03c2 = clone $this->valueHolderb03c2;
    }

    public function __sleep()
    {
        $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, '__sleep', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;

        return array('valueHolderb03c2');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializere0eb8 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializere0eb8;
    }

    public function initializeProxy() : bool
    {
        return $this->initializere0eb8 && ($this->initializere0eb8->__invoke($valueHolderb03c2, $this, 'initializeProxy', array(), $this->initializere0eb8) || 1) && $this->valueHolderb03c2 = $valueHolderb03c2;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderb03c2;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderb03c2;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
