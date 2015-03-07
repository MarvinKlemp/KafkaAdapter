<?php

namespace MarvinKlemp\KafkaAdapter\Client\Producer;

interface ProducerInterface
{
    /**
     * Sends a record
     *
     * @param  ProducerRecord $aRecord
     * @param  callable       $aCallback
     * @return RecordMetadata
     */
    public function send(ProducerRecord $aRecord, callable $aCallback = null);
}
