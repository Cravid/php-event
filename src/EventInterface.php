<?php

namespace Cravid\Event;

interface EventInterface
{
    /**
     * Sets the event name.
     *
     * @param string $eventName The name of the event.
     * @return self
     */
    public function setName($eventName);

    /**
     * Returns the event name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the dispatcher.
     *
     * @param DispatcherInterface $dispatcher The dispatcher that dispatched the event.
     * @return self
     */
    public function setDispatcher(DispatcherInterface $dispatcher);

    /**
     * Returns the corresponding dispatcher object.
     *
     * @return DispatcherInterface
     */
    public function getDispatcher();

    /**
     * Returns whether further event listeners should be triggered.
     *
     * @return bool Whether propagation was already stopped for this event.
     */
    public function isPropagationStopped();

    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no
     * further event listener will be triggered once any trigger calls
     * stopPropagation().
     *
     * @return self
     */
    public function stopPropagation();
}
