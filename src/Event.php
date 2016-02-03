<?php

namespace Cravid\Event;

class Event implements EventInterface
{
    /**
     * @var string
     */
    protected $eventName = '';

    /**
     * @var DispatcherInterface
     */
    protected $dispatcher = null;

    /**
     * @var bool
     */
    protected $propagationStopped = false;

    
    /**
     * Sets the event name.
     *
     * @param string $eventName The name of the event.
     * @return self
     */
    public function setName($eventName)
    {
        if (!is_string($eventName)) {
            throw new \InvalidArgumentException(sprintf('Event name has to be a valid string, %s given.', gettype($eventName)));
        }

        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Returns the event name.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->eventName;
    }

    /**
     * Sets the dispatcher.
     *
     * @param DispatcherInterface $dispatcher The dispatcher that dispatched the event.
     * @return self
     */
    public function setDispatcher(DispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * Returns the corresponding dispatcher object.
     *
     * @return DispatcherInterface
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Returns whether further event listeners should be triggered.
     *
     * @return bool Whether propagation was already stopped for this event.
     */
    public function isPropagationStopped()
    {
        return $this->propagationStopped;
    }

    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no
     * further event listener will be triggered once any trigger calls
     * stopPropagation().
     *
     * @return self
     */
    public function stopPropagation()
    {
        $this->propagationStopped = true;

        return $this;
    }
}
