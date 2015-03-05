<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Client\Producer;

use MarvinKlemp\KafkaAdapter\Client\Producer\ProducerConfiguration;

class ProducerConfigTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $config = new ProducerConfiguration();

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Client\Producer\ProducerConfiguration", $config);
    }

    public function test_it_should_hold_the_default_configuration_set()
    {
        $expected = [
            'BUFFER_MEMORY_CONFIG_VALUE' => 33554432,
            'BUFFER_MEMORY_CONFIG_NAME' => 'BUFFER_MEMORY_CONFIG_VALUE',
            'RETRIES_CONFIG_VALUE' => 0,
            'RETRIES_CONFIG_NAME' => 'RETRIES_CONFIG_VALUE',
            'ACKS_CONFIG_VALUE' => '1',
            'ACKS_CONFIG_NAME' => 'ACKS_CONFIG_VALUE',
            'COMPRESSION_TYPE_CONFIG_VALUE' => 'none',
            'COMPRESSION_TYPE_CONFIG_NAME' => 'COMPRESSION_TYPE_CONFIG_VALUE',
            'BATCH_SIZE_CONFIG_VALUE' => 16384,
            'BATCH_SIZE_CONFIG_NAME' => 'BATCH_SIZE_CONFIG_VALUE',
            'TIMEOUT_CONFIG_VALUE' => 30000,
            'TIMEOUT_CONFIG_NAME' => 'TIMEOUT_CONFIG_VALUE',
            'SEND_BUFFER_CONFIG_VALUE' => 131072,
            'SEND_BUFFER_CONFIG_NAME' => 'SEND_BUFFER_CONFIG_VALUE',
            'RECEIVE_BUFFER_CONFIG_VALUE' => 32768,
            'RECEIVE_BUFFER_CONFIG_NAME' => 'RECEIVE_BUFFER_CONFIG_VALUE',
            'MAX_REQUEST_SIZE_CONFIG_VALUE' => 1048576,
            'MAX_REQUEST_SIZE_CONFIG_NAME' => 'MAX_REQUEST_SIZE_CONFIG_VALUE',
        ];
        $config = new ProducerConfiguration();

        $this->assertSame($expected, $config->configurations());
    }

    public function test_it_should_override_config_values()
    {
        $expected = [
            'BUFFER_MEMORY_CONFIG_VALUE' => 33554432,
            'BUFFER_MEMORY_CONFIG_NAME' => 'BUFFER_MEMORY_CONFIG_VALUE',
            'RETRIES_CONFIG_VALUE' => 0,
            'RETRIES_CONFIG_NAME' => 'RETRIES_CONFIG_VALUE',
            'ACKS_CONFIG_VALUE' => '1',
            'ACKS_CONFIG_NAME' => 'ACKS_CONFIG_VALUE',
            'COMPRESSION_TYPE_CONFIG_VALUE' => 'none',
            'COMPRESSION_TYPE_CONFIG_NAME' => 'COMPRESSION_TYPE_CONFIG_VALUE',
            'BATCH_SIZE_CONFIG_VALUE' => 16384,
            'BATCH_SIZE_CONFIG_NAME' => 'BATCH_SIZE_CONFIG_VALUE',
            'TIMEOUT_CONFIG_VALUE' => 1337,
            'TIMEOUT_CONFIG_NAME' => 'TIMEOUT_CONFIG_VALUE',
            'SEND_BUFFER_CONFIG_VALUE' => 131072,
            'SEND_BUFFER_CONFIG_NAME' => 'SEND_BUFFER_CONFIG_VALUE',
            'RECEIVE_BUFFER_CONFIG_VALUE' => 32768,
            'RECEIVE_BUFFER_CONFIG_NAME' => 'RECEIVE_BUFFER_CONFIG_VALUE',
            'MAX_REQUEST_SIZE_CONFIG_VALUE' => 100022,
            'MAX_REQUEST_SIZE_CONFIG_NAME' => 'MAX_REQUEST_SIZE_CONFIG_VALUE',
        ];

        $config = new ProducerConfiguration([
            ProducerConfiguration::TIMEOUT_CONFIG_NAME => 1337,
            ProducerConfiguration::MAX_REQUEST_SIZE_CONFIG_NAME => 100022,
        ]);

        $this->assertSame($expected, $config->configurations());
    }

    public function test_it_should_throw_an_exception_at_setting_unknown_configs()
    {
        $this->setExpectedException("InvalidArgumentException");
        $config = new ProducerConfiguration([
            "unprovided.config" => 42,
        ]);
    }
}
