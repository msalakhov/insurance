<?php

namespace Container2W5XEEh;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder8e89e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerf162f = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiese1c88 = [
        
    ];

    public function getConnection()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getConnection', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getMetadataFactory', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getExpressionBuilder', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'beginTransaction', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getCache', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getCache();
    }

    public function transactional($func)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'transactional', array('func' => $func), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->transactional($func);
    }

    public function commit()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'commit', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->commit();
    }

    public function rollback()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'rollback', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getClassMetadata', array('className' => $className), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'createQuery', array('dql' => $dql), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'createNamedQuery', array('name' => $name), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'createQueryBuilder', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'flush', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'clear', array('entityName' => $entityName), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->clear($entityName);
    }

    public function close()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'close', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->close();
    }

    public function persist($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'persist', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'remove', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'refresh', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'detach', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'merge', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getRepository', array('entityName' => $entityName), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'contains', array('entity' => $entity), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getEventManager', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getConfiguration', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'isOpen', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getUnitOfWork', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getProxyFactory', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'initializeObject', array('obj' => $obj), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'getFilters', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'isFiltersStateClean', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'hasFilters', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return $this->valueHolder8e89e->hasFilters();
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

        $instance->initializerf162f = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder8e89e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder8e89e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder8e89e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__get', ['name' => $name], $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        if (isset(self::$publicPropertiese1c88[$name])) {
            return $this->valueHolder8e89e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e89e;

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

        $targetObject = $this->valueHolder8e89e;
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
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e89e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8e89e;
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
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__isset', array('name' => $name), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e89e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder8e89e;
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
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__unset', array('name' => $name), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e89e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder8e89e;
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
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__clone', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        $this->valueHolder8e89e = clone $this->valueHolder8e89e;
    }

    public function __sleep()
    {
        $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, '__sleep', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;

        return array('valueHolder8e89e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerf162f = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerf162f;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerf162f && ($this->initializerf162f->__invoke($valueHolder8e89e, $this, 'initializeProxy', array(), $this->initializerf162f) || 1) && $this->valueHolder8e89e = $valueHolder8e89e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder8e89e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder8e89e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
