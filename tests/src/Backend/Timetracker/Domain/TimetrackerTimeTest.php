<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Domain;

use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;

class TimetrackerTimeTest extends TestCase
{
    /** @test */
    public function it_should_create_timetracker_time()
    {
        new TimetrackerName('123');
    }
    
    /** @test */
    public function it_should_return_correct_format()
    {
        $pattern = "/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])$/";

        $timeTrackerTime = new TimetrackerTime(5420);
        $timetrackerString = $timeTrackerTime->__toString();

        self::assertEquals(1, preg_match($pattern, $timetrackerString));
    }
}