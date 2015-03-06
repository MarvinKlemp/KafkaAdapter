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
     * @param $aTopic
     * @return PartitionInfo[]
     * @throws \RuntimeException
     */
    public function partitionsForTopic($aTopic)
    {
        if (!isset($this->cluster[$aTopic])) {
            throw new \RuntimeException(sprintf("Unknown Topic \"%s\"", $aTopic));
        }

        return $this->cluster[$aTopic];
    }

    public function partitionsForNode()
    {
    }

    public function partition()
    {
    }

    /**
     * @param  TopicPartition $aTopicPartition
     * @return Node
     */
    public function leaderFor(TopicPartition $aTopicPartition)
    {
        $topic = $aTopicPartition->topic();
        $partition = $aTopicPartition->partition();

        if (!isset($this->cluster[$topic])) {
            throw new \RuntimeException(
                sprintf("Unknown Topic \"%s\"", $topic)
            );
        }

        if (!isset($this->cluster[$topic][$partition])) {
            throw new \RuntimeException(
                sprintf("Unknown Partition \"%d\" for Topic %s", $partition, $topic)
            );
        }

        return $this->cluster[$topic][$partition]->leader();
    }

    public function nodes()
    {
    }
}
