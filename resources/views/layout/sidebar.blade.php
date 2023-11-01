<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('company.create') }}">
                        <i class="bi bi-circle"></i><span>Create Company</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.show', ['company']) }}">
                        <i class="bi bi-circle"></i><span>Company List</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('employee.create') }}">
                        <i class="bi bi-circle"></i><span>Create Employee</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.show', ['company']) }}">
                        <i class="bi bi-circle"></i><span>Employee List</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

       <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Stripe payment gateway</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/admin/stripe') }}">
                        <i class="bi bi-circle"></i><span>Stripe</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->





    </ul>
    </li><!-- End Icons Nav -->

    </ul>

</aside><!-- End Sidebar-->
