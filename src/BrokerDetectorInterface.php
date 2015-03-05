<?php

namespace MarvinKlemp\KafkaAdapter;

interface BrokerDetectorInterface
{
    /**
     * Returns a list of Brokers
     *
     * @return
     */
    public function listOfBrokers();
}
