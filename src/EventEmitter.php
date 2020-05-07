<?php
namespace EventEmitter;

class EventEmitter
{
    /**
     * @var array
     */
    private $events;

    public function on($event, $function)
    {
        if (!isset($this->events[$event]))
            $this->events[$event] = [];
        
        $this->events[$event][] = $function;
    }

    public function emit($event, ...$data)
    {
        if (!isset($this->events[$event]))
            return;
        
        foreach ($this->events[$event] as $event_handler)
            $event_handler(...$data);
    }
}