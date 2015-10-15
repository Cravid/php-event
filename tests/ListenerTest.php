<?php

namespace Cravid\Event;

class ListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     */
    public function testNotify()
    {
        $listener = new Listener('test', function () {
            return true;
        });

        $this->assertTrue($listener->notify(new Event()));
    }
}