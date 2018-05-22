<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">{{ optional($current_session_data)->session }} <span class="sr-only">(current)</span></a></li>
                <!-- Student Links -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                       Student <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('students.create') }}">New Adminssion</a>
                        </li>
                        <li>
                            <a href="{{ route('students.index') }}">All Student</a>
                        </li>
                    </ul>
                </li>

                <!-- Fees Links -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                       Accounts <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('accounts-heads.index') }}">Accounts Head</a>
                        </li>
                        <li>
                            <a href="{{ route('accounts-transactions.index') }}">Income/Expense</a>
                        </li>
                        <li>
                            <a href="{{ route('accounts.fees-collection.showFeesPaymentForm') }}">Fees Collection</a>
                        </li>
                        <li>
                            <a href="{{ route('accounts.balance-sheet') }}">Balance Sheet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('employees.index') }}">Employees</a>
                </li>
                <!-- Fees Links -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                       Exam Report <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('accounts-heads.index') }}">Accounts Head</a>
                        </li>
                    </ul>
                </li>                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Settings Links -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                       Settings <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('school.edit', 1) }}">School</a>
                        </li>
                        <li>
                            <a href="{{ route('school-sessions.index') }}">Session</a>
                        </li>  
                        <li>
                            <a href="{{ route('school-sessions.show-set-session-form') }}">Set Current Session</a>
                        </li>                            
                        <li>
                            <a href="{{ route('school-classes.index') }}">Class</a>
                        </li>                        
                        <li>
                            <a href="{{ route('sections.index') }}">Section</a>
                        </li>  
                        <li>
                            <a href="{{ route('social-categories.index') }}">Social Category</a>
                        </li>                              
                        <li>
                            <a href="{{ route('subject-groups.index') }}">Subject Group</a>
                        </li>   
                        <li>
                            <a href="{{ route('fees-categories.index') }}">Fees Category</a>
                        </li>                                                                   
                        <li>
                            <a href="{{ route('fees-structures.index') }}">Fees Structures</a>
                        </li>    
                        <li>
                            <a href="{{ route('employee-positions.index') }}">Employee Positions</a>
                        </li>        
                    </ul>
                </li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>