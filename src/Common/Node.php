<?php

namespace MarvinKlemp\KafkaAdapter\Common;

class Node
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var int
     */
    protected $port;

    /**
     * @param string $anId
     * @param string $aHost
     * @param int    $aPort
     */
    public function __construct($anId, $aHost, $aPort)
    {
        if ($anId === null | trim($anId) === "") {
            throw new \InvalidArgumentException("You have to provide an ID");
        }

        // validate hostname
        // validate port
        $this->host = $aHost;
        $this->port = $aPort;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function host()
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function port()
    {
        return $this->port;
    }
}
