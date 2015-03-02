<?php

namespace MarvinKlemp\KafkaAdapter\Producer;

interface ProducerInterface
{
    /**
     * Is used to send Records to Brokers
     *
     * @param ProducerRecord $record
     * @param callable       $callback
     */
    public function send(ProducerRecord $record, callable $callback = null);
}
