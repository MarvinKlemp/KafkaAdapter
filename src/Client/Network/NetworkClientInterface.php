<?php

namespace MarvinKlemp\KafkaAdapter\Client\Network;

use MarvinKlemp\KafkaAdapter\Common\Node;

interface NetworkClientInterface
{
    /**
     * @param BinaryMessageSet $aMessageSet
     * @param Node             $node
     */
    public function send(BinaryMessageSet $aMessageSet, Node $node);
}
