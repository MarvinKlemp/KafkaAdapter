<?php

namespace MarvinKlemp\KafkaAdapter\Common;

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
}
