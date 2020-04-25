<?php


namespace Timetracker\Tests\src\Backend\Timetracker\Persistence;


use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Container;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;
use Timetracker\Shared\ValueObject\UuidVO;

class EloquentTimetrackerRepository extends TestCase
{
    /** @test */
    public function it_should_get_all_time_trackers()
    {
        /** @var TimetrackerRepository $repository */
        $repository = $this->initialize_repository();

        $repository->getAll();
    }

    /** @test */
    public function it_should_persist_time_tracker()
    {
        /** @var TimetrackerRepository $repository */
        $repository = $this->initialize_repository();

        $timetracker = new Timetracker(
            new TimetrackerId(UuidVO::generate()),
            new TimetrackerName('Test name'),
            new TimetrackerTime('30')
        );

        $repository->persist($timetracker);
    }

    /** @test */
    public function it_should_delete_time_tracker_by_uuid()
    {
        /** @var TimetrackerRepository $repository */
        $repository = $this->initialize_repository();

        $timetrackerId = new TimetrackerId(UuidVO::generate());
        $timetracker = new Timetracker(
            new TimetrackerId($timetrackerId),
            new TimetrackerName('Test name'),
            new TimetrackerTime('30')
        );

        $repository->persist($timetracker);

        $repository->delete($timetrackerId);
    }


    private function initialize_repository()
    {
        $container = new Container();
        /** @var TimetrackerRepository $repository */
        return $container->get(TimetrackerRepository::class);
    }
}