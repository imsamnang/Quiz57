
<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state hidden-print">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <ul class="nav nav-list">
        {{-- Dashboard --}}
        <li class="{!! request()->is('/')?'active':'' !!}">
            <a href="{{ route('home') }}" >
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> @lang('m_dashboard') </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
        </li>
        <li class="{!! request()->is('exam')?'active':'' !!}  hover">
            <a href="{{ route('quiz.subject.index') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                @lang('Create New Quiz')
            </a>
            <b class="arrow"></b>
        </li>                
    </ul><!-- /.nav-list -->
</div>
