<?php


namespace Timetracker\Backend\Timetracker\Infrastructure;


use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

final class FileTimetrackerRepository implements TimetrackerRepository
{
    const FILE_PATH = __DIR__.'/timetracker.repo';

    public function save(Timetracker $timetracker): void
    {
        file_put_contents(self::FILE_PATH, serialize($timetracker));
        // TODO: Implement save() method.
    }

    public function search(string $id): ?Timetracker
    {
        // TODO: Implement search() method.
    }
}