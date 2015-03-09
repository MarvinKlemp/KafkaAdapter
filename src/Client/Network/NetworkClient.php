<?php

namespace MarvinKlemp\KafkaAdapter\Client\Network;

use MarvinKlemp\KafkaAdapter\Common\Node;

class NetworkClient implements NetworkClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function send(BinaryMessageSet $aMessageSet, Node $node)
    {
    }
}
