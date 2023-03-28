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
            <a href="{{ route("staff.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("staff/crm-customers*") ? "c-show" : "" }} {{ request()->is("staff/crm-notes*") ? "c-show" : "" }} {{ request()->is("staff/appointments*") ? "c-show" : "" }} {{ request()->is("staff/crm-documents*") ? "c-show" : "" }} {{ request()->is("staff/photos*") ? "c-show" : "" }} {{ request()->is("staff/expenses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.crm-customers.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/crm-customers") || request()->is("staff/crm-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.crm-notes.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/crm-notes") || request()->is("staff/crm-notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('appointment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.appointments.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/appointments") || request()->is("staff/appointments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.appointment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.crm-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/crm-documents") || request()->is("staff/crm-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('photo_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.photos.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/photos") || request()->is("staff/photos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-camera c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.photo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('expense_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.expenses.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/expenses") || request()->is("staff/expenses/*") ? "c-active" : "" }}">
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
            <li class="c-sidebar-nav-dropdown {{ request()->is("staff/users*") ? "c-show" : "" }} {{ request()->is("staff/leave-applications*") ? "c-show" : "" }} {{ request()->is("staff/user-alerts*") ? "c-show" : "" }} {{ request()->is("staff/staff-availabilities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-male c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.users.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/users") || request()->is("staff/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('leave_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.leave-applications.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/leave-applications") || request()->is("staff/leave-applications/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.leaveApplication.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/user-alerts") || request()->is("staff/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('staff_availability_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.staff-availabilities.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/staff-availabilities") || request()->is("staff/staff-availabilities/*") ? "c-active" : "" }}">
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
            <li class="c-sidebar-nav-dropdown {{ request()->is("staff/crm-statuses*") ? "c-show" : "" }} {{ request()->is("staff/appoimntment-statuses*") ? "c-show" : "" }} {{ request()->is("staff/client-tags*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.configuration.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.crm-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/crm-statuses") || request()->is("staff/crm-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('appoimntment_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.appoimntment-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/appoimntment-statuses") || request()->is("staff/appoimntment-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bars c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.appoimntmentStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.client-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/client-tags") || request()->is("staff/client-tags/*") ? "c-active" : "" }}">
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
            <li class="c-sidebar-nav-dropdown {{ request()->is("staff/permissions*") ? "c-show" : "" }} {{ request()->is("staff/roles*") ? "c-show" : "" }} {{ request()->is("staff/audit-logs*") ? "c-show" : "" }} {{ request()->is("staff/leave-approvals*") ? "c-show" : "" }} {{ request()->is("staff/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.administration.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/permissions") || request()->is("staff/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/roles") || request()->is("staff/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/audit-logs") || request()->is("staff/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('leave_approval_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.leave-approvals.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/leave-approvals") || request()->is("staff/leave-approvals/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.leaveApproval.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('billing_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("staff/billing-runs*") ? "c-show" : "" }} {{ request()->is("staff/invoices*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.billing.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('billing_run_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("staff.billing-runs.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/billing-runs") || request()->is("staff/billing-runs/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.billingRun.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('invoice_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("staff.invoices.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/invoices") || request()->is("staff/invoices/*") ? "c-active" : "" }}">
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
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
