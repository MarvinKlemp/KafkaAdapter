<?php

namespace MarvinKlemp\KafkaAdapter\Client\Producer;

class Producer implements ProducerInterface
{
    public function send(ProducerRecord $record, callable $callback = null)
    {
    }
}
