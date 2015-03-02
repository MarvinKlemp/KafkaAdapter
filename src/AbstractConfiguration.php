<?php

namespace MarvinKlemp\KafkaAdapter;

abstract class AbstractConfiguration
{
    protected $configs;

    public function __construct($class, array $configs = [])
    {
        $this->configs = (new \ReflectionClass($class))->getConstants();

        foreach ($configs as $key => $val) {
            if (isset($this->configs[$key])) {
                $this->configs[$key] = $val;
            } else {
                throw new \InvalidArgumentException(sprintf("Configuration %s is not available", $key));
            }
        }
    }

    public function get($key)
    {
        if (!isset($this->configs[$key])) {
            throw new \InvalidArgumentException(sprintf("Configuration %s is not available", $key));
        }

        return $this->configs[$key];
    }

    public function configurations()
    {
        return $this->configs;
    }
}
