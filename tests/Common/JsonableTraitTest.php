<?php

namespace Test\Common;

use Guillermoandrae\Common\JsonableTrait;
use PHPUnit\Framework\TestCase;

class JsonableTraitTest extends TestCase
{
    public function testToString()
    {
        $expectedJson = json_encode(['test' => 'yes']);
        $trait = $this->getMockForTrait(JsonableTrait::class);
        $trait->expects($this->once())
            ->method('toJson')
            ->willReturn($expectedJson);
        $this->assertSame($expectedJson, (string) $trait);
    }
}
