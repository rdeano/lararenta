<nav class="navbar navbar-default">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('storage/app/upload/renticon.png')}}" style="display:inline-block;width:25px;height:25px;" /> {{ config('app.name', 'RentAMachine') }}</a>
           </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

             <ul class="nav navbar-nav navbar-right">
               <!-- <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Action</a></li>
                   <li><a href="#">Another action</a></li>
                   <li><a href="#">Something else here</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="#">Separated link</a></li>
                 </ul>
               </li> -->

               @if (Route::has('login'))
                   <!-- <div class="top-right links"> -->
                       @if (Auth::check())
                           <!-- <li><a href="{{ url('/home') }}">Home</a></li> -->
                              <li><a href="{{ route('item.index') }}">Item</a></li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="{{ route('profile.index') }}">Profile</a></li>
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                               </ul>
                              </li>



                       @else
                           <li><a href="{{ url('/login') }}">Login</a></li>
                           <li><a href="{{ url('/register') }}">Register</a></li>
                       @endif
                   <!-- </div> -->
               @endif


               <!-- <li><a href="#">Register</a></li>
               <li><a href="#">Login</a></li> -->

             </ul>
           </div><!-- /.navbar-collapse -->

          <div class="clearfix"></div>



      </div>
</nav>
