<?php

namespace MarvinKlemp\KafkaAdapter\Tests\Common;

use MarvinKlemp\KafkaAdapter\Common\Cluster;

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
        $topicPartition = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\TopicPartition")->disableOriginalConstructor()->getMock();
        $topicPartition->expects($this->once())->method("topic")->willReturn("kafka.topic1");
        $topicPartition->expects($this->once())->method("partition")->willReturn(0);
        $node = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\Node")->disableOriginalConstructor()->getMock();
        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();
        $partitionInfo->expects($this->once())
            ->method('leader')
            ->willReturn($node);

        $cluster = new Cluster([
            'kafka.topic1' => [0 => $partitionInfo],
        ]);

        $this->assertSame($node, $cluster->leaderFor($topicPartition));
    }

    public function test_it_should_return_the_partitions_where_the_node_is_the_leader()
    {
        $node = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\Node")->disableOriginalConstructor()->getMock();

        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();
        $partitionInfo->expects($this->any())
            ->method('leader')
            ->willReturn($node);

        $partitionInfo2 = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();
        $partitionInfo2->expects($this->any())
            ->method('leader')
            ->willReturn("");

        $cluster = new Cluster([
            'kafka.topic1' => [0 => $partitionInfo],
            'kafka.topic2' => [0 => $partitionInfo2],
            'kafka.topic3' => [0 => $partitionInfo],
        ]);

        $this->assertSame([$partitionInfo, $partitionInfo], $cluster->partitionsForNode($node));
    }

    public function test_it_should_return_partition_info_for_topic_partition()
    {
        $topicPartition = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\TopicPartition")->disableOriginalConstructor()->getMock();
        $topicPartition->expects($this->once())->method("topic")->willReturn("kafka.topic1");
        $topicPartition->expects($this->once())->method("partition")->willReturn(0);
        $partitionInfo = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\PartitionInfo")->disableOriginalConstructor()->getMock();

        $cluster = new Cluster([
            'kafka.topic1' => [0 => $partitionInfo],
        ]);

        $this->assertSame($partitionInfo, $cluster->partitionInfoFor($topicPartition));
    }

    public function test_it_throws_invalid_argument_exception_at_passing_an_unknown_topic()
    {
        $cluster = new Cluster([
        ]);

        $this->setExpectedException("\InvalidArgumentException", "Unknown Topic \"kafka.topic\"");
        $cluster->partitionsForTopic("kafka.topic");
    }

    public function test_it_throws_invalid_argument_exception_at_passing_an_unknown_topic_partition()
    {
        $topicPartition = $this->getMockBuilder("MarvinKlemp\KafkaAdapter\Common\TopicPartition")->disableOriginalConstructor()->getMock();
        $topicPartition->expects($this->once())->method("topic")->willReturn("kafka.topic1");
        $topicPartition->expects($this->once())->method("partition")->willReturn(1);

        $cluster = new Cluster([
            'kafka.topic1' => [0 => ""],
        ]);

        $this->setExpectedException("\InvalidArgumentException", "Unknown partition \"1\" for topic \"kafka.topic1\"");
        $cluster->partitionInfoFor($topicPartition);
    }
}
