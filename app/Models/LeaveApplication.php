<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveApplication extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'leave_applications';

    protected $dates = [
        'leave_start',
        'leave_ends',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'staff_member_id',
        'leave_start',
        'leave_ends',
        'user_notes',
        'approved',
        'admin_notes',
        'editable',
        'deleteable',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        LeaveApplication::observe(new \App\Observers\LeaveApplicationActionObserver());
    }

    public function staff_member()
    {
        return $this->belongsTo(User::class, 'staff_member_id');
    }

    public function getLeaveStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLeaveStartAttribute($value)
    {
        $this->attributes['leave_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLeaveEndsAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLeaveEndsAttribute($value)
    {
        $this->attributes['leave_ends'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
