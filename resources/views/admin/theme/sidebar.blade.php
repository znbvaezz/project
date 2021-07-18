<!-- sidebar-->
<aside class="aside-container">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav class="sidebar" data-sidebar-anyclick-close="">
            <!-- START sidebar nav-->
            <ul class="sidebar-nav">
                <!-- START user info-->
                <li class="has-user-block">
                    <div class="collapse" id="user-block">
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" src="/themes/angle/img/user/02.jpg"
                                         alt="Avatar" width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name">{{ $user->full_name }}</span>
                                <span class="user-block-role">مدیر</span>
                                <span class="user-block-status"><a style="color: darkred;font-size: 9pt"
                                                                   href="{{ Route('admin_logout') }}">خروج</a> </span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- END user info-->
                <!-- Iterates over all sidebar items-->
                <li class="nav-heading ">
                    <span data-localize="sidebar.heading.HEADER">منوی اصلی</span>
                </li>

                <li class="@if(Request()->url() === Route('admin_dashboard'))active @endif">
                    <a href="{{ Route('admin_dashboard') }}" title="میزکار">
                        <em class="icon-screen-desktop"></em>
                        <span data-localize="sidebar.nav.orders">میزکار</span>
                    </a>
                </li>

                @if($user->admin->type == 'admin')
                    <li class="@if(Request()->url() === Route('admin_transaction_list'))active @endif">
                        <a href="{{ Route('admin_transaction_list') }}" title="تراکنش ها">
                            <em class="icon-bell"></em>
                            <span data-localize="sidebar.nav.orders">تراکنش ها</span>
                        </a>
                    </li>

                    <li class="@if(Request()->url() === Route('admin_agent_list'))active @endif">
                        <a href="{{ Route('admin_agent_list') }}" title="کارگزاری">
                            <em class="icon-user"></em>
                            <span data-localize="sidebar.nav.orders">کارگزاری</span>
                        </a>
                    </li>

                @endif

                @if($user->admin->type == 'agent')
                    <li class="@if(Request()->url() === Route('agent_request_list'))active @endif">
                        <a href="{{ Route('agent_request_list') }}" title="درخواست بازنشستگی">
                            <em class="icon-bell"></em>
                            <span data-localize="sidebar.nav.orders">درخواست بازنشستگی</span>
                        </a>
                    </li>

                    <li class="@if(Request()->url() === Route('agent_history_list'))active @endif">
                        <a href="{{ Route('agent_history_list') }}" title="درخواست سابقه">
                            <em class="icon-user"></em>
                            <span data-localize="sidebar.nav.orders">درخواست سابقه</span>
                        </a>
                    </li>

                @endif

            </ul>
        </nav>
    </div>
</aside>
