<?php

namespace MarvinKlemp\KafkaAdapter\Common;

class PartitionInfo
{
    /**
     * @var int
     */
    protected $partition;

    /**
     * @var Node
     */
    protected $leader;

    /**
     * @var string
     */
    protected $topic;

    /**
     * @var Node[]
     */
    protected $replicas;

    /**
     * @param int    $aPartition
     * @param Node   $aLeader
     * @param string $aTopic
     * @param Node[] $replicas
     */
    public function __construct($aPartition, Node $aLeader, $aTopic, array $replicas)
    {
        $this->partition = $aPartition;
        $this->leader = $aLeader;
        $this->topic = $aTopic;
        $this->replicas = $replicas;
    }

    /**
     * @return Node
     */
    public function leader()
    {
        return $this->leader;
    }

    /**
     * @return string
     */
    public function topic()
    {
        return $this->topic;
    }

    /**
     * @return int
     */
    public function partition()
    {
        return $this->partition;
    }

    /**
     * @return Node[]
     */
    public function replicas()
    {
        return $this->replicas;
    }
}
