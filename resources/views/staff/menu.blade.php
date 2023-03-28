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
                    @can('appointment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.appointments.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/appointments") || request()->is("staff/appointments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.appointment.title') }}
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
                    @can('leave_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("staff.leave-applications.index") }}" class="c-sidebar-nav-link {{ request()->is("staff/leave-applications") || request()->is("staff/leave-applications/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.leaveApplication.title') }}
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
