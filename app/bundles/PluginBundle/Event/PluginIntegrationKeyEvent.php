<?php

namespace Mautic\PluginBundle\Event;

use Mautic\PluginBundle\Integration\UnifiedIntegrationInterface;

class PluginIntegrationKeyEvent extends AbstractPluginIntegrationEvent
{
    /**
     * @var array
     */
    private $keys;

    public function __construct(UnifiedIntegrationInterface $integration, array $keys = null)
    {
        $this->integration = $integration;
        $this->keys        = $keys;
    }

    /**
     * Get the keys array.
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Set new keys array.
     */
    public function setKeys(array $keys)
    {
        $this->keys = $keys;
    }
}
