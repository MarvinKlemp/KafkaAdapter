<?php

namespace MarvinKlemp\KafkaAdapter\Producer;

class ProducerRecord
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
     * @var int|string
     */
    protected $key;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param  string                    $aTopic
     * @param  int                       $aPartition
     * @param  string|int                $aKey
     * @param  string                    $aValue
     * @throws \InvalidArgumentException
     */
    protected function __construct($aTopic, $aPartition = 0, $aKey, $aValue)
    {
        if ($aTopic === null | trim($aTopic) === "") {
            throw new \InvalidArgumentException("You have to provide a topic");
        }

        $this->topic = $aTopic;
        $this->partition = $aPartition;
        $this->key = $aKey;
        $this->value = $aValue;
    }

    /**
     * @param  string                    $aTopic
     * @param  int                       $aPartition
     * @param  string|int                $aKey
     * @param  string                    $aValue
     * @return ProducerRecord
     * @throws \InvalidArgumentException
     */
    public static function createRecordWithPartition($aTopic, $aPartition, $aKey, $aValue)
    {
        return new ProducerRecord($aTopic, $aPartition, $aKey, $aValue);
    }

    /**
     * @param  string                    $aTopic
     * @param  string|int                $aKey
     * @param  string                    $aValue
     * @return ProducerRecord
     * @throws \InvalidArgumentException
     */
    public static function createRecord($aTopic, $aKey, $aValue)
    {
        return new ProducerRecord($aTopic, 0, $aKey, $aValue);
    }

    /**
     * @param  string                    $aTopic
     * @param  string                    $aValue
     * @return ProducerRecord
     * @throws \InvalidArgumentException
     */
    public static function createRecordWithoutKey($aTopic, $aValue)
    {
        return new ProducerRecord($aTopic, 0, "", $aValue);
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
     * @return int|string
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }
}
