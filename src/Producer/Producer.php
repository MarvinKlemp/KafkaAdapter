<?php

namespace MarvinKlemp\KafkaAdapter\Producer;

class Producer implements ProducerInterface
{
    public function send(ProducerRecord $record, callable $callback = null)
    {
    }
}
