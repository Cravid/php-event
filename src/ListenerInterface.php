<?php

namespace Cravid\Event;

interface ListenerInterface
{
    /**
     * @param string   $eventName The event name.
     * @param callable $callback  The callback action.
     */
    public function __construct($eventName, callable $callback = null);

    /**
     * Executes the callback action.
     *
     * @param Event The dispatched event instance.
     * @return mixed
     * @throws ListenerException if an issue in the callback execution occurs.
     */
    public function notify(EventInterface $event);
}
