<?php

namespace Mautic\ChannelBundle\Event;

use Mautic\ChannelBundle\Entity\MessageQueue;
use Mautic\CoreBundle\Event\CommonEvent;

class MessageQueueProcessEvent extends CommonEvent
{
    public function __construct(MessageQueue $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return MessageQueue
     */
    public function getMessageQueue()
    {
        return $this->entity;
    }

    /**
     * @return bool
     */
    public function checkContext($channel)
    {
        return $channel === $this->entity->getChannel();
    }
}
