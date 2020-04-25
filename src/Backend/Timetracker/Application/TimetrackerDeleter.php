<?php


namespace Timetracker\Backend\Timetracker\Application;


use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

final class TimetrackerDeleter
{
    /** @var TimetrackerRepository */
    private $repository;

    public function __construct(TimetrackerRepository $timetrackerRepository)
    {
        $this->repository = $timetrackerRepository;
    }

    public function __invoke(string $id): void
    {
        $this->repository->delete(new TimetrackerId($id));
    }
}