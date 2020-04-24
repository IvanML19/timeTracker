<?php


namespace Timetracker\Backend\Timetracker\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Timetracker\Backend\Timetracker\Domain\Timetracker;
use Timetracker\Backend\Timetracker\Domain\TimetrackerId;
use Timetracker\Backend\Timetracker\Domain\TimetrackerName;
use Timetracker\Backend\Timetracker\Domain\TimetrackerTime;

class TimetrackerEloquentModel extends Model
{
    const CREATED_AT = 'dateadd';
    const UPDATED_AT = 'dateupd';

    protected $table = 'timetracker';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = ['name', 'time'];

    public static function castCollectionToDomainObject(Collection $collection): array
    {
        $output = array();
        foreach ($collection as $item) {
            array_push($output, new Timetracker(
                new TimetrackerId($item->uuid),
                new TimetrackerName($item->name),
                new TimetrackerTime($item->time)
            ));
        }

        return $output;
    }
}