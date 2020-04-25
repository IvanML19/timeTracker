<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Domain;


use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Shared\ValueObject\UuidVO;

class TimetrackerIdTest extends TestCase
{
    /** @test */
    public function it_should_create_timetracker_id()
    {
        $id = '4ade44a9-f3f2-4552-81f6-a6b1063785f2';
        new TimetrackerId($id);
    }

    /** @test */
    public function it_should_create_valid_uuid()
    {
        $id = UuidVO::generate();
        new TimetrackerId($id);
    }
}