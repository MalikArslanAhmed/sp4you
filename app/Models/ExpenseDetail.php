<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use Carbon\Carbon;
use \DateTimeInterface;

class ExpenseDetail extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'expense_details';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'expense_id',
        'client_id'
    ];


    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }

    public function client()
    {
        return $this->belongsTo(CrmCustomer::class, 'client_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
