<?php

namespace MarvinKlemp\KafkaAdapter\Client\Producer;

use MarvinKlemp\KafkaAdapter\Common\Cluster;

class Producer implements ProducerInterface
{
    /**
     * @var ProducerConfiguration
     */
    protected $config;

    /**
     * @var Cluster
     */
    protected $cluster;

    /**
     * @param ProducerConfiguration $aConfig
     * @param Cluster               $aCluster
     */
    public function __construct(ProducerConfiguration $aConfig, Cluster $aCluster)
    {
        $this->config = $aConfig;
        $this->cluster = $aCluster;
    }

    /**
     * {@inheritDoc}
     */
    public function send(ProducerRecord $aRecord, callable $aCallback = null)
    {
    }
}
