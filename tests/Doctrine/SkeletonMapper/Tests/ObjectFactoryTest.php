<?php

namespace Doctrine\SkeletonMapper\Tests\Persister;

use Doctrine\SkeletonMapper\ObjectFactory;
use PHPUnit_Framework_TestCase;

/**
 * @group unit
 */
class ObjectFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $factory = new ObjectFactoryStub();
        $object = $factory->create('stdClass');
        $this->assertInstanceOf('stdClass', $object);
    }

    public function testCreateWithReflectionMethod()
    {
        $factory = new ObjectFactoryReflectionMethodStub();
        $object = $factory->create('stdClass');
        $this->assertInstanceOf('stdClass', $object);
    }
}

class ObjectFactoryStub extends ObjectFactory
{
}

class ObjectFactoryReflectionMethodStub extends ObjectFactory
{
    protected function isReflectionMethodAvailable()
    {
        return true;
    }
}
