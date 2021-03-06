<?php

namespace Cravid\Event;

class Dispatcher implements DispatcherInterface
{
    /**
     * @var ListenerInterface[][][]
     */
    protected $listeners = array();


    /**
     * {@inheritDoc}
     */
    public function addListener($eventName, ListenerInterface $listener, $priority = 0)
    {
        if (!is_string($eventName)) {
            throw new \InvalidArgumentException(sprintf('Event name has to be a valid string, %s given.', gettype($eventName)));
        }

        if (!is_integer($priority)) {
            throw new \InvalidArgumentException(sprintf('Priority has to be an integer, %s given.', gettype($priority)));
        }

        $this->listeners[$eventName][$priority][] = $listener;
        
        ksort($this->listeners[$eventName], SORT_NUMERIC);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeListener($eventName, ListenerInterface $listener)
    {
        if (!isset($this->listeners[$eventName])) {
            return 0;
        }

        $count = 0;
        foreach ($this->listeners[$eventName] as $priority => $listeners)
        {
            $count += count($listeners);
            if (false !== ($key = array_search($listener, $listeners, true))) {
                unset($this->listeners[$eventName][$priority][$key]);
            }

            if (empty($this->listeners[$eventName][$priority])) {
                unset($this->listeners[$eventName][$priority]);
            }
            
            if (empty($this->listeners[$eventName])) {
                unset($this->listeners[$eventName]);
            }
        }
        return $count;
    }

    /**
     * {@inheritDoc}
     */
    public function getListeners($eventName = null)
    {
        if (null === $eventName) {
            return $this->listeners;
        }

        if (!isset($this->listeners[$eventName])) {
            return array();
        }

        return $this->listeners[$eventName];
    }

    /**
     * {@inheritDoc}
     */
    public function dispatch($eventName, EventInterface $event = null)
    {
        if ($event === null) {
            $event = new Event();
        }

        $event->setName($eventName);
        $event->setDispatcher($this);

        if (isset($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $priority => $listeners)
            {
                foreach ($listeners as $key => $listener)
                {
                    $listener->notify($event);

                    if ($event->isPropagationStopped()) {
                        break;
                    }
                }
                
                if ($event->isPropagationStopped()) {
                    break;
                }
            }
        }
        
        return $event;
    }
}
