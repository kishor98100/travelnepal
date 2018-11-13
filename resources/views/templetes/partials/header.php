 <div class="container-fluid">

        <!-- ------------------------------------------------------------------------------------------------------------------------ -->
        <!-- top header starts-->
        <header>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 top-left-panel">
                    <h4>
                        <a href="">Travel Nepal</a>
                    </h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10 top-right-panel">
                    <div class=" col-md-2 col-lg-2 col-xl-2 hamberger-menu float-left" id="hamb-menu">
                        <i class="fa fa-bars pull-left"></i>
                    </div>
                    <div class=" col-md-10 col-lg-10 col-xl-10 icongroup ">

                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope-o">
                                        <span class="badge badge-primary">3</span>
                                    </i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <p>no messages</p>

                                </div>
                            </li>
                            <li class="nav-item user-section">
                                <img src="{{ base_url() }}/img/user.png" alt="user" width="40px" height="40px">
                                <a href="" class="username-label">
                                    {{ auth.user.fullname }}</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell">
                                        <span class="badge badge-primary">3</span>
                                    </i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <p>No notifications</p>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item btn btn-primary" href="{{ base_url() }}/logout">Log Out</a>
                                </div>
                            </li>

                        </ul>


                    </div>
                </div>
            </div>
        </header>

        <!-- top header ends -->
        <!-- ------------------------------------------------------------------------------------------------------------------------ -->
        <div class="clearfix"></div>
