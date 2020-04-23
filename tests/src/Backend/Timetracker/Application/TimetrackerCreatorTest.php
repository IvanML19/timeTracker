<?php

declare(strict_types = 1);

namespace Timetracker\Tests\src\backend\Timetracker\Application;


use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Application\TimetrackerCreator;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerDuration;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

class TimetrackerCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_new_timetracker(): void
    {
        $repository = $this->createMock(TimetrackerRepository::class);

        /** @var TimetrackerCreator $creator */
        $creator = new TimetrackerCreator($repository);

        $id = new TimetrackerId('7309dfe7-3bd1-4696-9458-67c8af9bcbec');
        $name = new TimetrackerName('Timetracker Test');
        $duration = new TimetrackerDuration('00:32');
        $timeTracker = new Timetracker($id, $name, $duration);

        $repository->method('save')->with($timeTracker);

        $creator->__invoke('7309dfe7-3bd1-4696-9458-67c8af9bcbec', 'Timetracker Test', '00:32');
    }

}