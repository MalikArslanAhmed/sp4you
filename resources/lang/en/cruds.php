<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'profile_color'            => 'Profile Color',
            'profile_color_helper'     => 'Colour to be used to represent the profile in calendars etc.',
        ],
    ],
    'basicCRM' => [
        'title'          => 'Client Management',
        'title_singular' => 'Client Management',
    ],
    'crmStatus' => [
        'title'          => 'Client Status',
        'title_singular' => 'Client Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmCustomer' => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'first_name'        => 'First name',
            'first_name_helper' => ' ',
            'last_name'         => 'Last name',
            'last_name_helper'  => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'tags'              => 'Tags',
            'tags_helper'       => ' ',
            'phone_2'           => 'Phone 2',
            'phone_2_helper'    => ' ',
            'city'              => 'City',
            'city_helper'       => ' ',
            'postcode'          => 'Postcode',
            'postcode_helper'   => ' ',
            'state'             => 'State',
            'state_helper'      => ' ',
        ],
    ],
    'crmNote' => [
        'title'          => 'Notes',
        'title_singular' => 'Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmDocument' => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer'             => 'Customer',
            'customer_helper'      => ' ',
            'document_file'        => 'File',
            'document_file_helper' => ' ',
            'name'                 => 'Document name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'configuration' => [
        'title'          => 'Configuration',
        'title_singular' => 'Configuration',
    ],
    'appointment' => [
        'title'          => 'Appointment',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'notes'                 => 'Notes',
            'notes_helper'          => ' ',
            'start_time'            => 'Start Time',
            'start_time_helper'     => ' ',
            'end_time'              => 'End Time',
            'end_time_helper'       => ' ',
            'check_in'              => 'Check In',
            'check_in_helper'       => ' ',
            'check_out'             => 'Check Out',
            'check_out_helper'      => ' ',
            'address'               => 'Address',
            'address_helper'        => ' ',
            'city'                  => 'City',
            'city_helper'           => ' ',
            'postcode'              => 'Postcode',
            'postcode_helper'       => ' ',
            'state'                 => 'State',
            'state_helper'          => ' ',
            'clients'               => 'Clients',
            'clients_helper'        => 'Clients the appointment is for.',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'assigned_staff'        => 'Assigned Staff',
            'assigned_staff_helper' => ' ',
            'status'                => 'Status',
            'status_helper'         => ' ',
            'billing_run'           => 'Billing Run',
            'billing_run_helper'    => 'Shows Billing run number when billed',
            'photos'                => 'Photos',
            'photos_helper'         => ' ',
            'documents'             => 'Documents',
            'documents_helper'      => ' ',
        ],
    ],
    'photo' => [
        'title'          => 'Photos',
        'title_singular' => 'Photo',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'client'             => 'Client',
            'client_helper'      => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'appointment'        => 'Appointment',
            'appointment_helper' => ' ',
        ],
    ],
    'appoimntmentStatus' => [
        'title'          => 'Appoimntment Status',
        'title_singular' => 'Appoimntment Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'clientTag' => [
        'title'          => 'Client Tags',
        'title_singular' => 'Client Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tags'              => 'Tags',
            'tags_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'leaveApplication' => [
        'title'          => 'Leave Application',
        'title_singular' => 'Leave Application',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'leave_start'         => 'Leave Start',
            'leave_start_helper'  => ' ',
            'leave_ends'          => 'Leave Ends',
            'leave_ends_helper'   => ' ',
            'notes'               => 'Notes',
            'admin_notes'         => 'Admin Notes',
            'notes_helper'        => ' ',
            'approved'            => 'Approved',
            'approved_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'staff_member'        => 'Staff Member',
            'staff_member_helper' => ' ',
        ],
    ],
    'administration' => [
        'title'          => 'Administration',
        'title_singular' => 'Administration',
    ],
    'staffAvailability' => [
        'title'          => 'Staff Availability',
        'title_singular' => 'Staff Availability',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'monday'              => 'Monday',
            'monday_helper'       => ' ',
            'tuesday'             => 'Tuesday',
            'tuesday_helper'      => ' ',
            'wednesday'           => 'Wednesday',
            'wednesday_helper'    => ' ',
            'thursday'            => 'Thursday',
            'thursday_helper'     => ' ',
            'friday'              => 'Friday',
            'friday_helper'       => ' ',
            'saturday'            => 'Saturday',
            'saturday_helper'     => ' ',
            'sunday'              => 'Sunday',
            'sunday_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'staff_member'        => 'Staff Member',
            'staff_member_helper' => ' ',
        ],
    ],
    'expense' => [
        'title'          => 'Expenses',
        'title_singular' => 'Expense',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'date'                  => 'Date',
            'date_helper'           => 'Date of the expense',
            'decscription'          => 'Decscription',
            'decscription_helper'   => 'Description of the expense',
            'receipt_photo'         => 'Receipt Photo',
            'receipt_photo_helper'  => ' ',
            'client'                => 'Client',
            'client_helper'         => 'Related client for expense',
            'appointment'           => 'Appointment',
            'appointment_helper'    => 'Related Appointments',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'ammount'               => 'Ammount',
            'ammount_helper'        => ' ',
            'invoice_number'        => 'Invoice Number',
            'invoice_number_helper' => ' ',
        ],
    ],
    'billingRun' => [
        'title'          => 'Billing Run',
        'title_singular' => 'Billing Run',
    ],
    'leaveApproval' => [
        'title'          => 'Leave Approval',
        'title_singular' => 'Leave Approval',
        'approve' => 'Approve',
        'reject' => 'Reject',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'leave_start'         => 'Leave Start',
            'leave_start_helper'  => ' ',
            'leave_ends'          => 'Leave Ends',
            'leave_ends_helper'   => ' ',
            'user_notes'          => 'User Notes',
            'admin_notes'         => 'Notes',
            'admin_notes'         => 'Admin Notes',
            'notes_helper'        => ' ',
            'approved'            => 'Approved',
            'approved_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'staff_member'        => 'Staff Member',
            'staff_member_helper' => ' ',
            'editable'            =>'Editable',
            'deleteable'            =>'Deleteable'
        ],
    ],
    'billing' => [
        'title'          => 'Billing',
        'title_singular' => 'Billing',
    ],
    'invoice' => [
        'title'          => 'Invoices',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'clients'               => 'Clients',
            'clients_helper'        => ' ',
            'appointment'           => 'Appointment',
            'appointment_helper'    => ' ',
            'xero_invoice'          => 'Xero Invoice',
            'xero_invoice_helper'   => 'Xero Invoice Number once sent',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'invoice_number'        => 'Invoice Number',
            'invoice_number_helper' => ' ',
        ],
    ],
];
