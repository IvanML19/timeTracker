<?php


namespace Timetracker\Backend\Timetracker\Application;


use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;
use Timetracker\Shared\ValueObject\UuidVO;

final class TimetrackerCreator
{
    /** @var TimetrackerRepository */
    private $repository;

    public function __construct(TimetrackerRepository $timetrackerRepository)
    {
        $this->repository = $timetrackerRepository;
    }

    public function __invoke(string $name, string $time, string $uuid = null): void
    {
        if (null == $uuid) {
            $uuid = UuidVO::generate();
        }

        $timetrackerId = new TimetrackerId($uuid);
        $timetrackerName = new TimetrackerName($name);
        $timetrackerTime = new TimetrackerTime($time);
        $timeTracker = new Timetracker($timetrackerId, $timetrackerName, $timetrackerTime);

        $this->repository->persist($timeTracker);
    }
}