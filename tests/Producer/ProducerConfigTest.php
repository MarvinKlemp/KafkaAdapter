<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Producer;

use MarvinKlemp\KafkaAdapter\Producer\Configs;
use MarvinKlemp\KafkaAdapter\Producer\ProducerConfiguration;

class ProducerConfigTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $config = new ProducerConfiguration();

        $this->assertInstanceOf(ProducerConfiguration::class, $config);
    }

    public function test_it_should_hold_the_default_configuration_set()
    {
        $expected = [
            'BUFFER_MEMORY_CONFIG' => 33554432,
            'RETRIES_CONFIG' => 0,
            'ACKS_CONFIG' => '1',
            'COMPRESSION_TYPE_CONFIG' => 'none',
            'BATCH_SIZE_CONFIG' => 16384,
            'TIMEOUT_CONFIG' => 30000,
            'SEND_BUFFER_CONFIG' => 131072,
            'RECEIVE_BUFFER_CONFIG' => 32768,
            'MAX_REQUEST_SIZE_CONFIG' => 1048576,
        ];
        $config = new ProducerConfiguration();

        $this->assertSame($expected, $config->configurations());
    }

    public function test_it_should_override_config_values()
    {
        $config = new ProducerConfiguration();
        $this->assertSame(16384, $config->get(Configs::BATCH_SIZE_CONFIG));

        $config->set(Configs::BATCH_SIZE_CONFIG, 100);
        $this->assertSame(100, $config->get(Configs::BATCH_SIZE_CONFIG));
    }

    public function test_it_should_throw_an_exception_at_setting_unknown_configs()
    {
        $config = new ProducerConfiguration();

        $this->setExpectedException("InvalidArgumentException");
        $config->set("x", 100);
    }
} 