<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Producer;

use MarvinKlemp\KafkaAdapter\Producer\ProducerRecord;

class ProducerRecordTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initialized_using_create_record()
    {
        $record = ProducerRecord::createRecord("topic", "key", "data");

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Producer\ProducerRecord", $record);
    }

    public function test_it_should_be_initialized_using_create_record_with_partition()
    {
        $record = ProducerRecord::createRecordWithoutKey("topic", 2, "key", "data");

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Producer\ProducerRecord", $record);
    }

    public function test_it_should_be_initialized_using_create_record_without_key()
    {
        $record = ProducerRecord::createRecordWithoutKey("topic", "data");

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Producer\ProducerRecord", $record);
        $this->assertSame("", $record->key());
    }

    public function test_it_should_throw_an_invalid_argument_exception_if_empty_topic_is_provided()
    {
        $this->setExpectedException("\InvalidArgumentException", "You have to provide a topic");
        ProducerRecord::createRecord(" ", "key", "data");
    }
}
