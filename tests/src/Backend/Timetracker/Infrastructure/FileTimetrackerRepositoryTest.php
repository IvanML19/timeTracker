<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Infrastructure;


use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Infrastructure\FileTimetrackerRepository;

class FileTimetrackerRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_timetracker()
    {
        $repository = new FileTimetrackerRepository();
        $timetracker = new Timetracker('id', 'name', 'duration');

        $repository->save($timetracker);
    }
}