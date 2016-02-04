<?php

namespace Cravid\Event;

class Listener implements ListenerInterface
{
    /**
     * @var string
     */
    protected $eventName = '';

    /**
     * @var callable
     */
    protected $callback = null;


    /**
     * {@inheritDoc}
     */
    public function __construct($eventName, callable $callback = null)
    {
        $this->eventName = $eventName;

        if ($callback === null) {
            $callback = function (EventInterface $event, ListenerInterface $listener) {};
        }

        $this->callback = $callback;
    }

    /**
     * {@inheritDoc}
     */
    public function notify(EventInterface $event)
    {
        try {
            return call_user_func($this->callback, $event, $this);
        }
        catch (\Exception $e) {
            throw new ListenerException($e);
        }
    }
}
