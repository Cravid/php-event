<?php

namespace Cravid\Event;

interface DispatcherInterface
{
    /**
     * Adds an event listener.
     *
     * @param string            $eventName The specific event name.
     * @param ListenerInterface $listener  The event listener instance.
     * @param int               $priority  Prioritizes the event position in the dispatch order.
     *
     * @return Dispatcher
     */
    public function addListener($eventName, ListenerInterface $listener, $priority = 0);

    /**
     * Removes an event listener from the specified events.
     *
     * @param string            $eventName The event to remove a listener from.
     * @param ListenerInterface $listener  The listener to remove.
     *
     * @return int
     */
    public function removeListener($eventName, ListenerInterface $listener);

    /**
     * Gets the listeners of a specific event or all listeners.
     *
     * @param string $eventName The name of the event.
     *
     * @return ListenerInterface[][][]
     */
    public function getListeners($eventName = null);

    /**
     * Dispatches a specific event by the given event name.
     *
     * @param string $eventName The name of the event.
     * @param EventInterface $event Dispatched event instance, optional.
     *
     * @return EventInterface
     */
    public function dispatch($eventName, EventInterface $event = null);
}
