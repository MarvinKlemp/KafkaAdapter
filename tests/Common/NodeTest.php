<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Common;

use MarvinKlemp\KafkaAdapter\Common\Node;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $node = new Node("app.broker1", "localhost", 9093);

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Common\Node", $node);
    }

    public function test_it_should_throw_an_invalid_argument_exception_if_empty_id_is_provided()
    {
        $this->setExpectedException("\InvalidArgumentException", "You have to provide an ID");
        new Node("", "localhost", 9093);
    }
}
