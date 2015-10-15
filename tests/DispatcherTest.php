<?php

namespace Cravid\Event;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testAddListener()
    {
        $eventName = 'test';

        $dispatcher = new Dispatcher();
        $listener = new Listener($eventName);

        $dispatcher->addListener($eventName, $listener);

        $this->assertArrayHasKey($eventName, $dispatcher->getListeners());
    }

    /**
     */
    public function testRemoveListener()
    {
        $eventName = 'test';

        $dispatcher = new Dispatcher();
        $listener = new Listener($eventName);

        $dispatcher->addListener($eventName, $listener);
        $dispatcher->removeListener($eventName, $listener);

        $this->assertEmpty($dispatcher->getListeners());
    }

    /**
     */
    public function testDispatch()
    {
        
    }
}