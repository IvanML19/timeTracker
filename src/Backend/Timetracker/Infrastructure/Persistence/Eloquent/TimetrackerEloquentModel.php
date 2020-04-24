<?php


namespace Timetracker\Backend\Timetracker\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

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
}