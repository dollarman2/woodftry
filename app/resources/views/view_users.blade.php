﻿{{ $title = "View All Staffs" }}
@include('inc/headview')
<body class="theme-blue">
    @include('inc/loader')
    <div class="overlay"></div>
    @include('inc/nav')
    @include('inc/sidebar')
    <section class="content">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6" style="margin-top: -10px;">
                    <div class="pull-left" style="color:#16a085;">
                        <h4><i class="fa fa-home"></i> USERS</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" align="">
                    <div class="pull-right">
                        <span class="text-primary glyphicon glyphicon-calendar">
                        <?php
                            $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                        ?>
                        </span>
                    </div>
                </div>
            </div><hr>
            <div class="card">
                <div class="header">
                    <p>This page displays the users of this application.</p>
                    <p><a href="{{ url('/register') }}"><button class="btn btn-primary">Register New Staff <i class="material-icons">person_add</i></button></a></p>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        {{ csrf_field() }}
                         @include('inc.errors')
                         @include('inc.success')
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size:13px;">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Departrment</th>
                                        <th>Role / Level</th>
                                        <th>edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="" value="{{ $counter=1 }} ">
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td> {!! $counter++ !!} </td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>{!! $user->phone !!}</td>
                                        <td>{!! $user->department !!}</td>
                                        <td>
                                             @if($user->access_level == '1')
                                                SUPER ADMIN
                                            @elseif($user->access_level == '2')
                                                MANAGER
                                            @elseif($user->access_level == '3')
                                                INSPECTOR
                                            @else
                                                SALE REP
                                            @endif
                                        </td>
                                        <td><a href="{{ url('/view-users') }}/{{ $user->id }}"><button class="btn btn-sm btn-primary pull-right">Edit </button></a>
                                        </td>
                                        <td>
                                            <form action="{{ url('/view-users') }}/{{ $user->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-sm btn-primary pull-right" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of widgets -->
        </div>
    </section>
    <!-- Jquery Core Js -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ url('/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('/plugins/node-waves/waves.js') }}"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ url('/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ url('/js/admin.js') }}"></script>
    <script src="{{ url('/js/pages/tables/jquery-datatable.js') }}"></script>
    <!-- Demo Js -->
    <script src="{{ url('/js/demo.js') }}"></script>
</body>
</html>