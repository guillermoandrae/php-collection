<?php

namespace Test\Common;

use Guillermoandrae\Common\AbstractAggregate;
use PHPUnit\Framework\TestCase;
use ArrayIterator;

class AggregateTest extends TestCase
{
    /**
     * @var AbstractAggregate
     */
    protected $aggregate;

    public function testSetAndGet()
    {
        $this->aggregate->set(1, 2);
        $this->assertSame(2, $this->aggregate->get(1));
    }

    public function testOffsetSetAndOffsetGet()
    {
        $this->aggregate->offsetSet(2, 3);
        $this->assertSame(3, $this->aggregate->offsetGet(2));
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf(
            ArrayIterator::class,
            $this->aggregate->getIterator()
        );
    }

    protected function setUp(): void
    {
        $this->aggregate = $this->getMockForAbstractClass(
            AbstractAggregate::class,
            [[1]]
        );
    }
}
