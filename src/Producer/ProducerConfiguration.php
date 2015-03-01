<?php

namespace MarvinKlemp\KafkaAdapter\Producer;

class ProducerConfiguration
{
    /**
     *
     */
    const BUFFER_MEMORY_CONFIG = 33554432;

    /**
     *
     */
    const RETRIES_CONFIG = 0;

    /**
     *
     */
    const ACKS_CONFIG = "1";

    /**
     *
     */
    const COMPRESSION_TYPE_CONFIG = "none";

    /**
     *
     */
    const BATCH_SIZE_CONFIG = 16384;

    /**
     *
     */
    const TIMEOUT_CONFIG = 30000;

    /**
     *
     */
    const SEND_BUFFER_CONFIG = 131072;

    /**
     *
     */
    const RECEIVE_BUFFER_CONFIG = 32768;

    /**
     *
     */
    const MAX_REQUEST_SIZE_CONFIG = 1048576;

    protected $configs;

    public function __construct()
    {
        $this->configs = (new \ReflectionClass(__CLASS__))->getConstants();
    }

    public function set($key, $val)
    {
        if (!isset($this->configs[$key])) {
            throw new \InvalidArgumentException("");
        }

        $this->configs[$key] = $val;
    }

    public function get($key)
    {
        if (!isset($this->configs[$key])) {
            throw new \InvalidArgumentException("");
        }

        return $this->configs[$key];
    }

    public function configurations()
    {
        return $this->configs;
    }
}
