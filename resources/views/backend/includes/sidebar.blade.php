<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{--{{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}--}}
            <div class="input-group">
                {{--{{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}--}}

                  <span class="input-group-btn">
                    {{--<button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
                  </span><!--input-group-btn-->
            </div><!--input-group-->
        {{ Form::close() }}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            {{--<li class="header">{{ trans('menus.backend.sidebar.general') }}</li>--}}

            {{--<li class="{{ Active::pattern('admin/dashboard') }}">--}}
                {{--<a href="{{ route('admin.citizen') }}">--}}
                    {{--<i class="fa fa-dashboard"></i>--}}
                    {{--<span>{{ trans('menus.backend.sidebar.dashboard') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="{{ Active::pattern('admin/citizen') }}">
                <a href="{{ route('admin.citizen') }}">
                    <i class="fa fa-book"></i>
                    គ្រប់គ្រងអត្រានុកូលដ្ឋាន
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                </a>
            </li>
            <li class="{{ Active::pattern('admin/lettertype') }}">
                <a href="{{ route('admin.lettertype') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    គ្រប់គ្រងប្រភេទសំបុត្រ
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                </a>
            </li>
            <li class="{{ Active::pattern('admin/commune') }}">
                <a href="{{ route('admin.commune') }}">
                    <i class="fa fa-map-marker"></i>
                    គ្រប់គ្រងឃុំសង្កាត់
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                </a>
            </li>
            <li class="{{ Active::pattern('admin/gender') }}">
                <a href="{{ route('admin.gender') }}">
                    <i class="fa fa-transgender"></i>
                    គ្រប់គ្រងភេទ
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                </a>
            </li>
            {{--<li class="{{ Active::pattern('admin/type') }}">--}}
                {{--<a href="{{ route('admin.type') }}">--}}
                    {{--<i class="fa fa-dashboard"></i>--}}
                    {{--គ្រប់គ្រងសំបុត្រ--}}
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="{{ Active::pattern('admin/image') }}">--}}
                {{--<a href="{{ route('admin.image') }}">--}}
                    {{--<i class="fa fa-dashboard"></i>--}}
                    {{--គ្រប់គ្រងរូបភាព--}}
                    {{--<span>{{ trans('menus.backend.sidebar.Commune.list_commune') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}



            @permissions(['manage-users', 'manage-roles'])
                <li class="{{ Active::pattern('admin/access/*') }} treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        ការគ្រប់គ្រងអ្នកប្រើប្រាស់
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu {{ Active::pattern('admin/access/*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/access/*', 'display: block;') }}">
                        @permission('manage-users')
                            <li class="{{ Active::pattern('admin/access/user*') }}">
                                <a href="{{ route('admin.access.user.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    អ្នកប្រើប្រាស់

                                    {{--<span>{{ trans('labels.backend.access.users.management') }}</span>--}}
                                </a>
                            </li>
                        @endauth

                        @permission('manage-roles')
                            <li class="{{ Active::pattern('admin/access/role*') }}">
                                <a href="{{ route('admin.access.role.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    តួននាទី
                                    {{--<span>{{ trans('labels.backend.access.roles.management') }}</span>--}}
                                </a>
                            </li>
                        @endauth
                    </ul>
                </li>
            @endauth

            {{--<li class="header">{{ trans('menus.backend.sidebar.system') }}</li>--}}

            {{--<li class="{{ Active::pattern('admin/log-viewer*') }} treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-list"></i>--}}
                    {{--<span>{{ trans('menus.backend.log-viewer.main') }}</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">--}}
                    {{--<li class="{{ Active::pattern('admin/log-viewer') }}">--}}
                        {{--<a href="{{ route('admin.log-viewer::dashboard') }}">--}}
                            {{--<i class="fa fa-circle-o"></i>--}}
                            {{--<span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="{{ Active::pattern('admin/log-viewer/logs') }}">--}}
                        {{--<a href="{{ route('admin.log-viewer::logs.list') }}">--}}
                            {{--<i class="fa fa-circle-o"></i>--}}
                            {{--<span>{{ trans('menus.backend.log-viewer.logs') }}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
