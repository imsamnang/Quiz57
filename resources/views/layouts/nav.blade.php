<div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="{{ route('home') }}" class="navbar-brand">
                <small class="text-capitalize">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </small>
            </a>
    
            <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>
    
                <img src="{{ asset('assets/images/avatars/user.jpg') }}" alt="Jason's Photo" />
            </button>
    
            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
    
                <span class="icon-bar"></span>
    
                <span class="icon-bar"></span>
    
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal user-min">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('assets/images/avatars/user.jpg') }}" alt="Jason's Photo" />
                        <span class="user-info">
                                <small>Welcome,</small>
                                {{isset(auth()->user()->name)?auth()->user()->name:""}}
                            </span>
    
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
    
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>
    
                        <li class="divider"></li>
    
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
            <ul class="nav navbar-nav">
{{--                 @ability('super-admin', 'admin-control') --}}
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Admin Control
                            &nbsp;
                            <i class="ace-icon fa fa-angle-down bigger-110"></i>
                        </a>
    
                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-user bigger-110 blue"></i>
                                    Users & Roles
                                </a>
                            </li>
    
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cogs bigger-110 blue"></i>
                                    Settings
                                </a>
                            </li>
    
                            <li>
                                <a href="#" accesskey="L" target="blank">
                                    <i class="menu-icon fa fa-language" aria-hidden="true"></i>
                                    @lang('m_Language_Translations')
                                </a>
                            </li>
    
                        </ul>
                    </li>
 {{--                @endability --}}
            </ul>
        </nav>
        {{-- flag languages --}}
        <nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
        
            <ul class="nav navbar-nav">
            {{-- @ability('super-admin', 'admin-control') --}}
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php  $flag = app()->getLocale(); ?>
                <img src="{{asset('images/flags/'.$flag.'.png')}}" class="img-flag" alt="" width="32" height="18">
                &nbsp;{{ strtoupper($flag) }}
                </a>
    
                <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                <li>
                    <a href="{{ url('locale') }}/en">
                    <img src="{{asset('images/flags/en.png')}}" class="img-flag" alt="" width="32" height="18">
                    English
                    </a>
                </li>
                <li>
                    <a href="{{ url('locale') }}/kh">
                    <img src="{{asset('images/flags/kh.png')}}" class="img-flag" alt="" width="32" height="18">
                    Khmer
                    </a>
                </li>
                <li>
                    <a href="{{ url('locale') }}/th">
                    <img src="{{asset('images/flags/th.png')}}" class="img-flag" alt="" width="32" height="18">
                    Thai
                    </a>
                </li>
                <li>
                    <a href="{{ url('locale') }}/fr">
                    <img src="{{asset('images/flags/fr.png')}}" class="img-flag" alt="" width="32" height="18">
                    French
                    </a>
                </li>
                <li>
                    <a href="{{ url('locale') }}/de">
                    <img src="{{asset('images/flags/de.png')}}" class="img-flag" alt="" width="32" height="18">
                    German
                    </a>
                </li>
                </ul>
            </li>
            {{-- @endability --}}
        </ul>
        </nav>
    </div><!-- /.navbar-container -->
    </div>
    