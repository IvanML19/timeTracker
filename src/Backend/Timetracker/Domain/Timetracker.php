<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Timetracker\Domain;

use JsonSerializable;

final class Timetracker implements JsonSerializable
{
    private $id;
    private $name;
    private $time;

    /**
     * Timetracker constructor.
     * @param TimetrackerId $id
     * @param TimetrackerName $name
     * @param TimetrackerTime $time
     */
    public function __construct(TimetrackerId $id, TimetrackerName $name, TimetrackerTime $time)
    {
        $this->id = $id;
        $this->name = $name;
        $this->time = $time;
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
     * @return TimetrackerTime
     */
    public function getTime(): TimetrackerTime
    {
        return $this->time;
    }

    public function jsonSerialize()
    {
        return [
            'uuid' => $this->getId()->getValue(),
            'name' => $this->getName()->getValue(),
            'time' => $this->getTime()->getValue(),
        ];
    }
}