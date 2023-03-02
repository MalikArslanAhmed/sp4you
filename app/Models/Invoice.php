<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'invoices';

    public static $searchable = [
        'bill',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bill',
        'xero_invoice',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function clients()
    {
        return $this->belongsToMany(CrmCustomer::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
