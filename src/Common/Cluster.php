<?php

namespace MarvinKlemp\KafkaAdapter\Common;

class Cluster
{
    /**
     * @var PartitionInfo[] $cluster
     */
    protected $cluster;

    /**
     * @param PartitionInfo[] $cluster
     */
    public function __construct(array $cluster)
    {
        $this->cluster = $cluster;
    }

    /**
     * @return string[]
     */
    public function topics()
    {
        return array_keys($this->cluster);
    }

    /**
     * @param  TopicPartition            $aTopicPartition
     * @return PartitionInfo
     * @throws \InvalidArgumentException
     */
    public function partitionInfoFor(TopicPartition $aTopicPartition)
    {
        $topic = $aTopicPartition->topic();
        $partition = $aTopicPartition->partition();

        $this->knownTopic($topic);
        $this->knownPartition($topic, $partition);

        return $this->cluster[$topic][$partition];
    }

    /**
     * @param $aTopic
     * @return PartitionInfo[]
     * @throws \InvalidArgumentException
     */
    public function partitionsForTopic($aTopic)
    {
        $this->knownTopic($aTopic);

        return $this->cluster[$aTopic];
    }

    /**
     * @param Node $aNode
     *
     * return PartitionInfo[]
     */
    public function partitionsForNode(Node $aNode)
    {
        $result = [];

        foreach ($this->cluster as $topic => $partitions) {
            foreach ($partitions as $partitionInfo) {
                if ($partitionInfo->leader() === $aNode) {
                    $result[] = $partitionInfo;
                }
            }
        }

        return $result;
    }

    /**
     * @param  TopicPartition            $aTopicPartition
     * @return Node
     * @throws \InvalidArgumentException
     */
    public function leaderFor(TopicPartition $aTopicPartition)
    {
        return $this->partitionInfoFor($aTopicPartition)->leader();
    }

    public function nodes()
    {
    }

    /**
     * @param $aTopic
     * @throws \InvalidArgumentException
     */
    protected function knownTopic($aTopic)
    {
        if (!isset($this->cluster[$aTopic])) {
            throw new \InvalidArgumentException(sprintf("Unknown Topic \"%s\"", $aTopic));
        }
    }

    /**
     * @param $aTopic
     * @param $aPartition
     * @throws \InvalidArgumentException
     */
    protected function knownPartition($aTopic, $aPartition)
    {
        if (!isset($this->cluster[$aTopic][$aPartition])) {
            throw new \InvalidArgumentException(sprintf("Unknown partition \"%d\" for topic \"%s\"", $aPartition, $aTopic));
        }
    }
}
