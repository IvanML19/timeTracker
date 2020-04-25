<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Application;


use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Application\TimetrackerDeleter;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

class TimetrackerDeleteTest extends TestCase
{
    /** @test */
    public function it_should_delete_timetracker_by_id()
    {
        $repository = $this->createMock(TimetrackerRepository::class);

        /** @var TimetrackerDeleter $deleter */
        $deleter = new TimetrackerDeleter($repository);

        $timetrackerId = new TimetrackerId('4ade44a9-f3f2-4552-81f6-a6b1063785f2');
        $repository->method('delete')->with($timetrackerId);

        $deleter->__invoke('4ade44a9-f3f2-4552-81f6-a6b1063785f2');
    }

}