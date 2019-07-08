
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/ico" href="http://quickquiz.edu/images/logo/favicon.ico">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Quick Quiz</title>
  <!-- Styles -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
  <script>
    window.Laravel =  {"csrfToken":"{{csrf_token()}}"}
  </script>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="logo-main-block">
        <div class="container">
          <a href="http://quickquiz.edu" title="Quick Quiz">
          <img src="http://quickquiz.edu/images/logo/logo_1512974578qq2.png" class="img-responsive" alt="Quick Quiz">
            </a>
        </div>
      </div>
      <div class="nav-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="navbar-header">
                <!-- Branding Image -->
                <h4 class="heading">Quick Quiz</h4>
              </div>
            </div>
            <div class="col-md-6">
              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      Admin <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="http://quickquiz.edu/admin/my_reports" title="Dashboard">Dashboard</a></li>
                      <li>
                        <a href="http://quickquiz.edu/logout"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="http://quickquiz.edu/logout" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="Kqq0d2U3bLdj5iiThFMi51NpBFukxcwAMCatTdg3">
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="quiz-main-block">
        <div class="row">
          <div class="col-md-4">
            <div class="topic-block">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">HTML Quiz</span>
                  <p title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum mauris dui, vel sagittis nisi elementum ut.">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum mauris dui, vel sagittis nisi elementum ut.</p>
                  <div class="row">
                    <div class="col-xs-6 pad-0">
                      <ul class="topic-detail">
                        <li>Per Question Mark <i class="fa fa-long-arrow-right"></i></li>
                        <li>Total Marks <i class="fa fa-long-arrow-right"></i></li>
                        <li>Total Questions <i class="fa fa-long-arrow-right"></i></li>
                        <li>Total Time <i class="fa fa-long-arrow-right"></i></li>
                      </ul>
                    </div>
                    <div class="col-xs-6">
                      <ul class="topic-detail right">
                        <li>1</li>
                        <li>
                          10
                        </li>
                        <li>
                          10
                        </li>
                        <li>
                          80 minutes
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-action">
                  <a href="http://quickquiz.edu/start_quiz/1" class="btn btn-block" title="Start Quiz">Start Quiz</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Scripts -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    </body>
</html>
