<?php

declare(strict_types = 1);

namespace Timetracker\Tests\src\backend\Timetracker\Application;


use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Application\TimetrackerCreator;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

class TimetrackerCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_new_timetracker(): void
    {
        $repository = $this->createMock(TimetrackerRepository::class);

        /** @var TimetrackerCreator $creator */
        $creator = new TimetrackerCreator($repository);

        $id = 'id';
        $name = 'Timetracker Test';
        $duration = '00:32';
        $timeTracker = new Timetracker($id, $name, $duration);

        $repository->method('save')->with($timeTracker);

        $creator->__invoke($id, $name, $duration);
    }

}