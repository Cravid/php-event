<?php

namespace Cravid\Event;

trait DecoratorTrait
{
    /**
     * @var DispatcherInterface
     */
    protected $dispatcher = null;


    /**
     * Sets the dispatcher.
     *
     * @param DispatcherInterface $dispatcher The dispatcher object.
     * @return self
     */
    public function setDispatcher(DispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * Adds an event listener that listens on the specific event.
     *
     * @param string   $eventName The event to listen on.
     * @param callable $callback  The listener.
     * @param int      $priority  The higher this value, the earlier an event
     *                            listener will be triggered in the chain (defaults to 0).
     * @return self
     */
    public function on($eventName, callable $callback, $priority = 0)
    {
        $listener = new Listener($eventName, $callback);

        $this->dispatcher->addListener($eventName, $listener, $priority);

        return $this;
    }
}
