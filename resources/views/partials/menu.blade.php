<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crm-customers*") ? "c-show" : "" }} {{ request()->is("admin/crm-notes*") ? "c-show" : "" }} {{ request()->is("admin/appointments*") ? "c-show" : "" }} {{ request()->is("admin/crm-documents*") ? "c-show" : "" }} {{ request()->is("admin/photos*") ? "c-show" : "" }} {{ request()->is("admin/expenses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('appointment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.appointments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/appointments") || request()->is("admin/appointments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.appointment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('photo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.photos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/photos") || request()->is("admin/photos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-camera c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.photo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.expenses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.expense.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/leave-applications*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }} {{ request()->is("admin/staff-availabilities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('leave_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.leave-applications.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/leave-applications") || request()->is("admin/leave-applications/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.leaveApplication.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('staff_availability_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.staff-availabilities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/staff-availabilities") || request()->is("admin/staff-availabilities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.staffAvailability.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('configuration_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crm-statuses*") ? "c-show" : "" }} {{ request()->is("admin/appoimntment-statuses*") ? "c-show" : "" }} {{ request()->is("admin/client-tags*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.configuration.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('appoimntment_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.appoimntment-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/appoimntment-statuses") || request()->is("admin/appoimntment-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bars c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.appoimntmentStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-tags") || request()->is("admin/client-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientTag.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('administration_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/leave-approvals*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.administration.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('leave_approval_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.leave-approvals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/leave-approvals") || request()->is("admin/leave-approvals/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.leaveApproval.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('billing_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/billing-runs*") ? "c-show" : "" }} {{ request()->is("admin/invoices*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.billing.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('billing_run_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.billing-runs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/billing-runs") || request()->is("admin/billing-runs/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.billingRun.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('invoice_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.invoices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.invoice.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>