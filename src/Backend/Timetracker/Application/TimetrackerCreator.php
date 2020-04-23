<?php


namespace Timetracker\Backend\Timetracker\Application;


use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerDuration;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

final class TimetrackerCreator
{
    private $repository;

    public function __construct(TimetrackerRepository $timetrackerRepository)
    {
        $this->repository = $timetrackerRepository;
    }

    public function __invoke(string $id, string $name, string $duration)
    {
        /** @var Timetracker $timeTracker */
        $timetrackerId = new TimetrackerId($id);
        $timetrackerName = new TimetrackerName($name);
        $timetrackerDuration = new TimetrackerDuration($duration);
        $timeTracker = new Timetracker($timetrackerId, $timetrackerName, $timetrackerDuration);

        $this->repository->save($timeTracker);
    }
}