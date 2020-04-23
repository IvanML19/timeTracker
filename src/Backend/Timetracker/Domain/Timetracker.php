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
     * @param TimetrackerId $id
     * @param TimetrackerName $name
     * @param TimetrackerDuration $duration
     */
    public function __construct(TimetrackerId $id, TimetrackerName $name, TimetrackerDuration $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }

    /**
     * @return TimetrackerId
     */
    public function getId(): TimetrackerId
    {
        return $this->id;
    }

    /**
     * @return TimetrackerName
     */
    public function getName(): TimetrackerName
    {
        return $this->name;
    }

    /**
     * @return TimetrackerDuration
     */
    public function getDuration(): TimetrackerDuration
    {
        return $this->duration;
    }


}