<?php

namespace MarvinKlemp\KafkaAdapter\Client\Producer;

use MarvinKlemp\KafkaAdapter\Common\AbstractConfiguration;

class ProducerConfiguration extends AbstractConfiguration
{
    /**
     *
     */
    const BUFFER_MEMORY_CONFIG_VALUE = 33554432;
    const BUFFER_MEMORY_CONFIG_NAME = "BUFFER_MEMORY_CONFIG_VALUE";

    /**
     *
     */
    const RETRIES_CONFIG_VALUE = 0;
    const RETRIES_CONFIG_NAME = "RETRIES_CONFIG_VALUE";

    /**
     *
     */
    const ACKS_CONFIG_VALUE = "1";
    const ACKS_CONFIG_NAME = "ACKS_CONFIG_VALUE";

    /**
     *
     */
    const COMPRESSION_TYPE_CONFIG_VALUE = "none";
    const COMPRESSION_TYPE_CONFIG_NAME = "COMPRESSION_TYPE_CONFIG_VALUE";

    /**
     *
     */
    const BATCH_SIZE_CONFIG_VALUE = 16384;
    const BATCH_SIZE_CONFIG_NAME = "BATCH_SIZE_CONFIG_VALUE";

    /**
     *
     */
    const TIMEOUT_CONFIG_VALUE = 30000;
    const TIMEOUT_CONFIG_NAME = "TIMEOUT_CONFIG_VALUE";

    /**
     *
     */
    const SEND_BUFFER_CONFIG_VALUE = 131072;
    const SEND_BUFFER_CONFIG_NAME = "SEND_BUFFER_CONFIG_VALUE";

    /**
     *
     */
    const RECEIVE_BUFFER_CONFIG_VALUE = 32768;
    const RECEIVE_BUFFER_CONFIG_NAME = "RECEIVE_BUFFER_CONFIG_VALUE";

    /**
     *
     */
    const MAX_REQUEST_SIZE_CONFIG_VALUE = 1048576;
    const MAX_REQUEST_SIZE_CONFIG_NAME = "MAX_REQUEST_SIZE_CONFIG_VALUE";

    public function __construct(array $configs = [])
    {
        parent::__construct(__CLASS__, $configs);
    }
}
