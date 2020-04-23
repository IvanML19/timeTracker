<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Timetracker\Domain;


interface TimetrackerRepository
{
    public function save(Timetracker $timetracker): void;

    public function search(TimetrackerId $id): ?Timetracker;
}