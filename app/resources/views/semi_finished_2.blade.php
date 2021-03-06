﻿{{ $title = "View All In-house Order" }}
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
                        <h4><i class="fa fa-home"></i> SEMI-FINISHED (UPHOLSERY & SPRAYER) PRODUCTIONS</h4>
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
                <div class="col-lg-12">
                    @include('inc.errors')
                    @include('inc.success')
                </div>
            </div><hr/>
            <div class="card">
                <div class="header">
                    <p>This page displays the inhouse productions that are done by the carpenter before it is passed down to sprayer / upholsterer for final finishing. To add new production click the button below.</p>
                    <p><a href="{{ url('/in-house') }}"><button class="btn btn-primary">Add Carpenter Production <i class="material-icons">add</i></button></a> </p>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        {{ csrf_field() }}
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable " style="font-size:13px;">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product Key</th>
                                        <th>Client Name</th>
                                        <th>Carpenter Name</th>
                                        <th>Others Worker</th>
                                        <th>Design Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <input type="hidden" name="" value="{{ $counter=1 }} ">
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $order->product_key }}</td>
                                        <td>
                                            @foreach($clients as $client)
                                                @if($client->id == $order->client_id)
                                                    {{ $client->client_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($carps as $carp)
                                                @if($carp->id == $order->carpenter_id)
                                                    {{ $carp->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($carps as $carp)
                                                @if($carp->id == $order->sprayer_id || $carp->id == $order->upholstery_id)
                                                    {{ $carp->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($goods as $good)
                                                @if($good->design_ref == $order->design_ref)
                                                    {{ $good->design_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>@include('inc/itemdescription')</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>@if($order->status < 4) <button class="btn btn-danger btn-xs disabled">NOT COMPLETED</button>  @else <button class="btn btn-success disabled">COMPLETED</button>  @endif
                                        
                                        </td>
                                        
                                        <td>@if($order->status < 5)
                                            <a href="{{ url('/show-inhouse') }}/{{ $order->id }}&&{{ $order->client_id }}&&{{ $order->user_id }}&&{{ $order->carpenter_id}}"><button class="btn btn-primary">Process</button>  </a>
                                            @else
                                            @endif
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

    <!-- Bootstrap Core Js -->
    <script src="{{ url('/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ url('/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url('/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
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