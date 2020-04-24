<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Timetracker\Domain;


interface TimetrackerRepository
{
    public function getAll();

    public function save(Timetracker $timetracker): void;

    public function findById(TimetrackerId $id): ?Timetracker;
}