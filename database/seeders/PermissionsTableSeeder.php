<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 39,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 41,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 43,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 44,
                'title' => 'configuration_access',
            ],
            [
                'id'    => 45,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 46,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 47,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 48,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 49,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 50,
                'title' => 'photo_create',
            ],
            [
                'id'    => 51,
                'title' => 'photo_edit',
            ],
            [
                'id'    => 52,
                'title' => 'photo_show',
            ],
            [
                'id'    => 53,
                'title' => 'photo_delete',
            ],
            [
                'id'    => 54,
                'title' => 'photo_access',
            ],
            [
                'id'    => 55,
                'title' => 'appoimntment_status_create',
            ],
            [
                'id'    => 56,
                'title' => 'appoimntment_status_edit',
            ],
            [
                'id'    => 57,
                'title' => 'appoimntment_status_show',
            ],
            [
                'id'    => 58,
                'title' => 'appoimntment_status_delete',
            ],
            [
                'id'    => 59,
                'title' => 'appoimntment_status_access',
            ],
            [
                'id'    => 60,
                'title' => 'client_tag_create',
            ],
            [
                'id'    => 61,
                'title' => 'client_tag_edit',
            ],
            [
                'id'    => 62,
                'title' => 'client_tag_show',
            ],
            [
                'id'    => 63,
                'title' => 'client_tag_delete',
            ],
            [
                'id'    => 64,
                'title' => 'client_tag_access',
            ],
            [
                'id'    => 65,
                'title' => 'leave_application_create',
            ],
            [
                'id'    => 66,
                'title' => 'leave_application_edit',
            ],
            [
                'id'    => 67,
                'title' => 'leave_application_show',
            ],
            [
                'id'    => 68,
                'title' => 'leave_application_delete',
            ],
            [
                'id'    => 69,
                'title' => 'leave_application_access',
            ],
            [
                'id'    => 70,
                'title' => 'administration_access',
            ],
            [
                'id'    => 71,
                'title' => 'staff_availability_create',
            ],
            [
                'id'    => 72,
                'title' => 'staff_availability_edit',
            ],
            [
                'id'    => 73,
                'title' => 'staff_availability_show',
            ],
            [
                'id'    => 74,
                'title' => 'staff_availability_delete',
            ],
            [
                'id'    => 75,
                'title' => 'staff_availability_access',
            ],
            [
                'id'    => 76,
                'title' => 'expense_create',
            ],
            [
                'id'    => 77,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 78,
                'title' => 'expense_show',
            ],
            [
                'id'    => 79,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 80,
                'title' => 'expense_access',
            ],
            [
                'id'    => 81,
                'title' => 'billing_run_create',
            ],
            [
                'id'    => 82,
                'title' => 'billing_run_edit',
            ],
            [
                'id'    => 83,
                'title' => 'billing_run_show',
            ],
            [
                'id'    => 84,
                'title' => 'billing_run_delete',
            ],
            [
                'id'    => 85,
                'title' => 'billing_run_access',
            ],
            [
                'id'    => 86,
                'title' => 'leave_approval_create',
            ],
            [
                'id'    => 87,
                'title' => 'leave_approval_edit',
            ],
            [
                'id'    => 88,
                'title' => 'leave_approval_show',
            ],
            [
                'id'    => 89,
                'title' => 'leave_approval_delete',
            ],
            [
                'id'    => 90,
                'title' => 'leave_approval_access',
            ],
            [
                'id'    => 91,
                'title' => 'billing_access',
            ],
            [
                'id'    => 92,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 93,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 94,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 95,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 96,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 97,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 98,
                'title' => 'leave_application_status',
            ],
        ];

        Permission::insert($permissions);
    }
}
