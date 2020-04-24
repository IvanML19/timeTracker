<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Timetracker\Domain;


interface TimetrackerRepository
{
    public function getAll();

    public function findById(TimetrackerId $id): ?Timetracker;

    public function persist(Timetracker $timetracker): void;

    public function delete(TimetrackerId $id): void;
}