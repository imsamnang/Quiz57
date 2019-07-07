<div class="container">
    <div class="row">
                        
        <div class="col-md-3" style="padding-top:20px;">
            <a href="{{route('student-list')}}" class="easy-link-menu">
                <div class="dash-card card-sky text-xs-center">
                    <div class="card-block">
                        <h6 class="card-title">                    
                        <i class="ace-icon fa fa-users"></i>
                        </h6>
                        <p class="card-text"> បញ្ជីសិស្ស</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3" style="padding-top:20px;">
            <a href="{{route('student-list')}}" class="easy-link-menu">
                <div class="dash-card card-sky text-xs-center">
                    <div class="card-block">
                        <h6 class="card-title">                    
                        <i class="ace-icon fa fa-users"></i>
                        </h6>
                        <p class="card-text"> បញ្ជីបុគ្គលិក</p>
                    </div>
                </div>
            </a>
        </div>


                <div class="col-md-3" style="padding-top:20px;">
                    <a href="{{ route('staff-register') }}" class="easy-link-menu">
                        <div class="dash-card card-sky text-xs-center">
                            <div class="card-block">
                                <h4 class="card-title">
                                <i class="ace-icon fa fa-user-secret"></i>
                                </h4>
                                <p class="card-text"> ចុះឈ្មោះគ្រូ​</p>
                            </div>
                        </div>
                    </a>
                </div>

            

                <div class="col-md-3" style="padding-top:20px;">
                        <a href="{{ route('project-book') }}" class="easy-link-menu">
                            <div class="dash-card card-green text-xs-center">
                                <div class="card-block">
                                    <h4 class="card-title">
                                    <i class="ace-icon fa fa-book"></i>
                                    </h4>
                                    <p class="card-text"> សៀវភៅ</p>
                                </div>
                            </div>
                        </a>
                    </div>

        {{-- វគ្គខ្លី --}}
        <div class="col-md-3" style="padding-top:20px;">
                <a href="{{ route('projects.shortcourse')}}" class="easy-link-menu">
                    <div class="dash-card card-yellow text-xs-center">
                        <div class="card-block">
                            <h4 class="card-title">
                            <i class="ace-icon fa fa-book"></i>
                            </h4>
                            <p class="card-text"> វគ្គខ្លី</p>
                        </div>
                    </div>
                </a>
        </div>

        {{-- វគ្គវែង --}}
        <div class="col-md-3" style="padding-top:20px;">
            <a href="{{ route('projects.longcourse') }}" class="easy-link-menu">
                <div class="dash-card card-yellow text-xs-center">
                    <div class="card-block">
                        <h4 class="card-title">
                        <i class="ace-icon fa fa-book"></i>
                        </h4>
                        <p class="card-text"> វគ្គវែង</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3" style="padding-top:20px;">
            <a href="{{ route('login') }}" class="easy-link-menu">
                <div class="dash-card card-red text-xs-center">
                    <div class="card-block">
                        <h4 class="card-title">
                        <i class="menu-icon fa fa-bar-chart"></i>
                        </h4>
                        <p class="card-text">របាយការណ៍</p>
                    </div>
                </div>
            </a>
        </div>                 
    </div>
</div>
