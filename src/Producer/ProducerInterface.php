<?php

namespace MarvinKlemp\KafkaAdapter\Producer;

use MarvinKlemp\KafkaAdapter\PartitionInfo;

interface ProducerInterface
{
    /**
     * Sends a record
     *
     * @param  ProducerRecord $record
     * @param  callable       $callback
     * @return RecordMetadata
     */
    public function send(ProducerRecord $record, callable $callback = null);
}
