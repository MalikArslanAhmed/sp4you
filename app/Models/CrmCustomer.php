<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'crm_customers';

    public static $searchable = [
        'phone_2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'phone_2',
        'address',
        'postcode',
        'city',
        'state',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        CrmCustomer::observe(new \App\Observers\CrmCustomerActionObserver());
    }

    public function customerCrmNotes()
    {
        return $this->hasMany(CrmNote::class, 'customer_id', 'id');
    }

    public function customerCrmDocuments()
    {
        return $this->hasMany(CrmDocument::class, 'customer_id', 'id');
    }

    public function clientPhotos()
    {
        return $this->hasMany(Photo::class, 'client_id', 'id');
    }

    public function clientExpenses()
    {
        return $this->hasMany(Expense::class, 'client_id', 'id');
    }

    public function clientsAppointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    public function clientsInvoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class, 'status_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ClientTag::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
