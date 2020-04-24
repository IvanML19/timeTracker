<?php


namespace Timetracker\Backend\Timetracker\Infrastructure\Persistence;


use Illuminate\Support\Collection;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;

class EloquentTimetrackerRepository implements TimetrackerRepository
{

    public function getAll(): ?Collection
    {
        $model = new TimetrackerEloquentModel();

        return $model::all();
    }

    public function save(Timetracker $timetracker): void
    {
        $model = new TimetrackerEloquentModel();

        $model->uuid = $timetracker->getId();
        $model->name = $timetracker->getName();
        $model->time = $timetracker->getTime();

        $model->save();
    }

    public function findById(TimetrackerId $id): ?Timetracker
    {
        $model = TimetrackerEloquentModel::find($id->getValue());

        if (null == $model) {
            return null;
        }

        return new Timetracker(
            new TimetrackerId($model->id),
            new TimetrackerName($model->name),
            new TimetrackerTime($model->time)
        );
    }
}