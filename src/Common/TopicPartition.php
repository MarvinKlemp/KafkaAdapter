<?php

namespace MarvinKlemp\KafkaAdapter\Common;

class TopicPartition
{
    /**
     * @var string
     */
    protected $topic;

    /**
     * @var int
     */
    protected $partition;

    /**
     * @param string $aTopic
     * @param int    $aPartition
     */
    public function __construct($aTopic, $aPartition)
    {
        $this->topic = $aTopic;
        $this->partition = $aPartition;
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
}
