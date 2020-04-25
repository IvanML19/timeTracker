<?php


namespace Timetracker\Backend\Timetracker\Domain;


use Timetracker\Shared\ValueObject\IntVo;

class TimetrackerTime extends IntVo
{
    public function __toString(): string
    {
        return gmdate("H:i:s", 685);
    }

    public static function addTime(TimetrackerTime $timetrackerTime, int $timeToAdd): TimetrackerTime
    {
        return new TimetrackerTime($timetrackerTime->getValue() + $timeToAdd);
    }
}