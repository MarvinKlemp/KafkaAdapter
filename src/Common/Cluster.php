<?php

namespace MarvinKlemp\KafkaAdapter\Common;

use MarvinKlemp\KafkaAdapter\Zookeeper\Zookeeper;

class Cluster
{
    /**
     * @var Node[]
     */
    protected $nodes;

    /**
     * Returns the list of available Nodes
     *
     * @return Node[]
     */
    public function availableNodes()
    {
        return $this->nodes;
    }

    /**
     * @param Node[] $brokers
     */
    protected function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @param  array   $brokers
     * @return Cluster
     */
    public static function fromConfiguration(array $nodes)
    {
        return new Cluster($nodes);
    }

    public static function fromZookeeper(Zookeeper $zookeeper)
    {
    }
}
