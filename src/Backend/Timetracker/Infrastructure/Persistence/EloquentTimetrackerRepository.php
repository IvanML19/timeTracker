<?php

namespace Timetracker\Backend\Timetracker\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerRepository;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;

class EloquentTimetrackerRepository implements TimetrackerRepository
{
    public function getAll(): ?array
    {
        $model = new TimetrackerEloquentModel();
        $collection = $model::all();

        if (null == $collection) {
            return null;
        }

        return TimetrackerEloquentModel::castCollectionToDomainObject($collection);
    }

    public function findById(TimetrackerId $id): ?Timetracker
    {
        /** @var Model */
        $model = $this->findEloquentModelById($id->getValue());

        if (null == $model) {
            throw new NotFoundException('No timetracker with this id');
        }

        return new Timetracker(
            new TimetrackerId($model->uuid),
            new TimetrackerName($model->name),
            new TimetrackerTime($model->time)
        );
    }

    public function persist(Timetracker $timetracker): void
    {
        /** @var Model */
        $model = $this->findEloquentModelById($timetracker->getId());
        if (null == $model) {
            $model = new TimetrackerEloquentModel();

            $model->uuid = $timetracker->getId();
            $model->name = $timetracker->getName();
            $model->time = $timetracker->getTime();

            $model->save();
        } else {
            $model->name = $timetracker->getName();
            $model->time = $timetracker->getTime();

            $model->update();
        }
    }

    public function delete(TimetrackerId $id): void
    {
        $model = $this->findEloquentModelById($id->getValue());
        if (null == $model) {
            throw new NotFoundException('The resource does not exist');
        } else {
            $model->delete();
        }
    }

    private function findEloquentModelById(string $id): ?Model
    {
        return TimetrackerEloquentModel::find($id);
    }
}