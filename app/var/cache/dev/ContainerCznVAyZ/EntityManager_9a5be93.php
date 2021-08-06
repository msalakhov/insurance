<?php

namespace ContainerCznVAyZ;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder04363 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer633c9 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesf122e = [
        
    ];

    public function getConnection()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getConnection', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getMetadataFactory', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getExpressionBuilder', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'beginTransaction', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getCache', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getCache();
    }

    public function transactional($func)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'transactional', array('func' => $func), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->transactional($func);
    }

    public function commit()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'commit', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->commit();
    }

    public function rollback()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'rollback', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getClassMetadata', array('className' => $className), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'createQuery', array('dql' => $dql), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'createNamedQuery', array('name' => $name), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'createQueryBuilder', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'flush', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'clear', array('entityName' => $entityName), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->clear($entityName);
    }

    public function close()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'close', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->close();
    }

    public function persist($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'persist', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'remove', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'refresh', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'detach', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'merge', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getRepository', array('entityName' => $entityName), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'contains', array('entity' => $entity), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getEventManager', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getConfiguration', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'isOpen', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getUnitOfWork', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getProxyFactory', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'initializeObject', array('obj' => $obj), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'getFilters', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'isFiltersStateClean', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'hasFilters', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return $this->valueHolder04363->hasFilters();
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

        $instance->initializer633c9 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder04363) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder04363 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder04363->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__get', ['name' => $name], $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        if (isset(self::$publicPropertiesf122e[$name])) {
            return $this->valueHolder04363->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder04363;

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

        $targetObject = $this->valueHolder04363;
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
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder04363;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder04363;
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
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__isset', array('name' => $name), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder04363;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder04363;
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
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__unset', array('name' => $name), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder04363;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder04363;
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
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__clone', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        $this->valueHolder04363 = clone $this->valueHolder04363;
    }

    public function __sleep()
    {
        $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, '__sleep', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;

        return array('valueHolder04363');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer633c9 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer633c9;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer633c9 && ($this->initializer633c9->__invoke($valueHolder04363, $this, 'initializeProxy', array(), $this->initializer633c9) || 1) && $this->valueHolder04363 = $valueHolder04363;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder04363;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder04363;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
