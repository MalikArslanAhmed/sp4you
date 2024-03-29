<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use Carbon\Carbon;
use \DateTimeInterface;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Invoice extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'invoices';

    protected $cascadeDeletes = ['assigned_staffs'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'expense_id',
        'total_amount',
        'total_hours_consumed',
        'hour_charges',
        'status',
        'appointment_id',
        'xero_invoice_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


    public function client()
    {
        return $this->belongsTo(CrmCustomer::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
    public function assigned_staffs()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
