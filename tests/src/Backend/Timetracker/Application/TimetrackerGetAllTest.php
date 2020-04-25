<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Application;


use PHPUnit\Framework\TestCase;
use Timetracker\Backend\Timetracker\Application\TimetrackerGetAll;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;

class TimetrackerGetAllTest extends TestCase
{
    /** @test */
    public function it_should_return_array(): void
    {
        $repository = $this->createMock(TimetrackerRepository::class);

        /** @var TimetrackerGetAll $getter */
        $getter = new TimetrackerGetAll($repository);

        $repository->method('getAll');

        $getter->__invoke();
    }

}