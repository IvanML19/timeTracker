<?php


namespace Timetracker\Backend\Timetracker\Application;


use Timetracker\Backend\Timetracker\Domain\Timetracker;
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
        $timeTracker = new Timetracker($id, $name, $duration);

        $this->repository->save($timeTracker);
    }
}