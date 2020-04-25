<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Domain;

use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;

class TimetrackerNameTest extends TestCase
{
    /** @test */
    public function it_should_create_timetracker_name()
    {
        new TimetrackerName('Test name');
    }

    /** @test */
    public function name_should_have_less_than_40_chars() {
        $this->expectException(\InvalidArgumentException::class);

        $name = 'abdcdefghijklmnopqrstuvwxyzabdcdefghijklmnopq';
        new TimetrackerName($name);
    }

}