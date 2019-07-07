
        <div class="easy-link-menu">
            <div class="dash-card card-softred text-xs-center" style="border-radius:0px;">
                <div class="card-block">
                    <h6 class="card-title" style="text-align:left; padding-left:15px;">                    
                    {{-- <!-- <i class="ace-icon fa fa-users"></i> --> --}}
                    <a href="../{{Request::segment(1)}}" style="color:white;"> <i class="ace-icon fa fa-home"></i></a> ផ្ទាំងគ្រប់គ្រង
                    </h6>
                    <hr>
                    <p class="card-text">                        
                    {{-- {{$data['userRole']->display_name}} : {{$data['UserReader']->name}} --}}
                        {{ auth::user()->name }}
                     
                       
                    </p>
                    <p class="card-text">                        
                            {{auth::user()->email}}
                    </p>
                    <p class="card-text">                        
                            {{auth::user()->contact_number}}
                    </p>

                    <hr>
                    <a href="{{ route('projects') }}"><p class="card-text" style="text-align:left; padding-left:20px;"> ប្តូរលេខសំង៉ាត់</p></a>
                    <hr>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p class="card-text" style="text-align:left; padding-left:20px;"><i class="ace-icon fa fa-power-off"></i> ចាកចេញ</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    
                </div>
            </div>
        </div>
        {{-- គ្រប់គ្រងសិស្ស --}}
        <div class="easy-link-menu">
                <div class="dash-card card-blue text-xs-center" style="border-radius:0px;">
                    <div class="card-block">
                        <h6 class="card-title" style="text-align:left; padding-left:15px;">                    
                        {{-- <!-- <i class="ace-icon fa fa-users"></i> --> --}}
                        <i class="ace-icon fa fa-users"></i> សិស្ស ឬសិក្ខាកាម
                        </h6>
                        <hr>                        
                        <a href="{{ route('projects') }}"><p class="card-text" style="text-align:left; padding-left:20px;"> បញ្ជីរសិស្ស</p></a>
                       
                    </div>
            </div>
        </div>
            {{-- វគ្គខ្លី --}}
        <div class="easy-link-menu">
                <div class="dash-card card-yellow text-xs-center" style="border-radius:0px;">
                    <div class="card-block">
                        <h6 class="card-title" style="text-align:left; padding-left:15px;">                    
                        {{-- <!-- <i class="ace-icon fa fa-users"></i> --> --}}
                        <i class="ace-icon fa fa-users" ></i> វគ្គខ្លី
                        </h6>
                        <hr>                        
                        <a  href="{{ route('projects') }}"><p class="card-text" style="text-align:left; padding-left:20px;"> បញ្ជីរវគ្គខ្លី</p></a>
                        
                    </div>
                </div>
        </div>
        {{-- វគ្គវែង --}}
        <div class="easy-link-menu">
                <div class="dash-card card-green text-xs-center" style="border-radius:0px;">
                    <div class="card-block">
                        <h6 class="card-title" style="text-align:left; padding-left:15px;">                    
                        {{-- <!-- <i class="ace-icon fa fa-users"></i> --> --}}
                        <i class="ace-icon fa fa-users" ></i> វគ្គវែង
                        </h6>
                        <hr>                        
                        <a  href="{{ route('projects') }}"><p class="card-text" style="text-align:left; padding-left:20px;"> បញ្ជីរវគ្គវែង</p></a>
                       
                    </div>
                </div>
        </div>


