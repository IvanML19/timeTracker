<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Timetracker\Domain;


final class Timetracker
{
    private $id;
    private $name;
    private $duration;

    /**
     * Timetracker constructor.
     * @param $id
     * @param $name
     * @param $duration
     */
    public function __construct(string $id, string $name, string $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }


}