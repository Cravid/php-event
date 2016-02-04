<?php

namespace Cravid\Event;

class EventException extends \RuntimeException
{
    /**
     * Event instance.
     *
     * @var EventInterface
     */
    protected $event;


    /**
     * @param EventInterface $event The event instance.
     */
    public function __construct(EventInterface $event)
    {
        $this->event = $event;

        parent::__construct(sprintf('Exception in event "%s".', $event->getName()));
    }
}
