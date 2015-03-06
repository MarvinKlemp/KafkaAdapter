<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Common;

use MarvinKlemp\KafkaAdapter\Common\Cluster;
use MarvinKlemp\KafkaAdapter\Common\TopicPartition;

class ClusterTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $cluster = new Cluster([]);

        $this->assertInstanceOf("MarvinKlemp\KafkaAdapter\Common\Cluster", $cluster);
    }

    public function test_it_should_return_all_topics()
    {
        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();

        $cluster = new Cluster([
            'kafka.topic1' => [0 => $partitionInfo],
            'kafka.topic2' => [0 => $partitionInfo],
        ]);

        $this->assertEquals(['kafka.topic1', 'kafka.topic2'], $cluster->topics());
    }

    public function test_it_should_return_the_partition_info_for_a_given_topic()
    {
        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();

        $cluster = new Cluster([
            'kafka.topic1' => [$partitionInfo],
        ]);

        $this->assertSame([$partitionInfo], $cluster->partitionsForTopic('kafka.topic1'));
    }

    public function test_it_should_return_the_leader_for_a_given_topic_partition()
    {
        $node = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\Node")->disableOriginalConstructor()->getMock();

        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();
        $partitionInfo->expects($this->once())
            ->method('leader')
            ->willReturn($node);

        $cluster = new Cluster([
            'kafka.topic1' => [0 => $partitionInfo],
        ]);

        $this->assertSame($node, $cluster->leaderFor(new TopicPartition('kafka.topic1', 0)));
    }
}
