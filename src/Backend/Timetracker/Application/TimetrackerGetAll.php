<?php


namespace Timetracker\Backend\Timetracker\Application;

use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

final class TimetrackerGetAll
{
    private $repository;

    public function __construct(TimetrackerRepository $timetrackerRepository)
    {
        $this->repository = $timetrackerRepository;
    }

    public function __invoke(): ?array
    {
        return $this->repository->getAll();
    }
}