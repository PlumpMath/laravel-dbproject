@section('sidebar')
    <!-- sidebar block -->
    <div class='sidebar sidebar-hide vert-stretch'>
        <!-- sidebar elem -->
        <div class='sidebar-panel vert-stretch sidebar-btn'>
            <div class='vert-outer-wrap vert-stretch'>
                <div class='vert-inner-wrap'>
                    <i class='icon icon-reorder'></i>
                </div>
            </div>
        </div>
        <!-- sidebar elem -->
        <div class='sidebar-panel'>
            <div class='sidebar-panel-account'>
                <div class='sidebar-panel-account-user'>Admin</div>
                <div class='sidebar-panel-account-user-lbl lbl'>account name</div>
                <!-- sidebar commands block -->
                <ul class='sidebar-panel-account-cmds'>
                    <!-- sidebar commands elem -->
                    <li class='sidebar-panel-account-cmd'>
                        <a href="{{ $url['log_out'] }}">
                            <i class='icon icon-signout'></i>
                            <div class='sidebar-panel-account-cmd-lbl lbl'>Sign Out</div>
                        </a>
                    </li>
                    <!-- sidebar commands elem -->
                    <li class='sidebar-panel-account-cmd'>
                        <i class='icon icon-cogs'></i>
                        <div class='sidebar-panel-account-cmd-lbl lbl'>Account Settings</div>
                    </li>
                </ul>
            </div>
            <div class='sidebar-panel-nav'>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    
    <script>
        $('.sidebar-btn').on('click', function () {
            $('.sidebar').toggleClass('sidebar-show sidebar-hide');
        });
    </script>
@stop
