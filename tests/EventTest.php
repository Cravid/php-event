<?php

namespace Cravid\Event;

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testGetName()
    {
    	$event = new Event();
    	$event->setName('test');

    	$this->assertEquals('test', $event->getName());
    }

    /**
     */
    public function testGetDispatcher()
    {
        $event = new Event();
        $dispatcher = new Dispatcher();
        $event->setDispatcher($dispatcher);

        $this->assertEquals($dispatcher, $event->getDispatcher());
    }

    /**
     */
    public function testIsPropagationStopped()
    {
        $event = new Event();
        $event->stopPropagation();

        $this->assertEquals(true, $event->isPropagationStopped());
    }
}