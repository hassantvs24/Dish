@extends('layouts.general')
@extends('box.customer.service')
@section('title')
    View Customer Details &amp; Package Setup
@endsection

@section('back-url')
    <div class="col-xs-12"><button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button></div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="icon-user-tie"></i> View Customer Details &amp; Package Setup</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail" src="{{ck_file('general', 'public/upload', $table->primaryPhoto)}}" alt="Customer Photo">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12"><h4 class="no-margin-top"><i class="icon-arrow-right15"></i> Customer Details</h4></div>
                            </div>
                            <table class="table  table-condensed table-hover">
                                <tr>
                                    <th class="text-bold">Name</th>
                                    <td class="text-danger">{{$table->name}}</td>
                                    <th class="text-bold">Contact</th>
                                    <td class="text-danger">{{$table->contact}}</td>
                                </tr>
                                <tr>
                                    <th class="text-bold">Father Name</th>
                                    <td class="text-muted">{{$table->fatherName}}</td>
                                    <th class="text-bold">NID</th>
                                    <td class="text-violet">{{$table->nid}}</td>
                                </tr>
                                <tr>
                                    <th class="text-bold">Mother Name</th>
                                    <td class="text-muted">{{$table->motherName}}</td>
                                    <th class="text-bold">Area</th>
                                    <td class="text-primary">{{$table->area['name']}}</td>
                                </tr>
                                <tr>
                                    <th class="text-bold">Birthday</th>
                                    <td class="text-muted">{{pub_date($table->dob)}}</td>
                                    <th class="text-bold">Category</th>
                                    <td class="text-muted">{{$table->category['name']}}</td>
                                </tr>
                                <tr>
                                    <th class="text-bold">Address</th>
                                    <td class="text-muted" colspan="4">{{$table->address}}</td>
                                </tr>
                            </table>

                            <div class="row">
                                <div class="col-md-6"><h4 class="mt-20 mb-5"><i class="icon-arrow-right15"></i> Service/Package</h4></div>
                                <div class="col-md-6 mt-20 mb-5 text-right"><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Register New Service</button></div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered  table-condensed table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package</th>
                                            <th>Dish Type</th>
                                            <th>Card</th>
                                            <th>Box</th>
                                            <th>P.Type</th>
                                            <th>Amount</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $service = $table->service()->orderBy('servicesID', 'DESC')->get();
                                            @endphp
                                            @foreach($service as $row)
                                                <tr>
                                                    <td>{{$row->servicesID}}</td>
                                                    <td>{{$row->package['name']}}</td>
                                                    <td>{{$row->dishType}}</td>
                                                    <td>{{$row->dishCard}}</td>
                                                    <td>{{$row->dishBox}}</td>
                                                    <td>{{$row->dishP}}</td>
                                                    <td>{{money($row->billingAmount)}}</td>
                                                    <td class="text-right">
                                                        @if($row->status == 'Active')
                                                            <a href="{{action('Customer\CustomerController@service_activate', ['id' => $row->servicesID])}}" class="btn btn-xs btn-info no-padding mr-5 ediBtn" onclick="return confirm('Are you sure to deactivate this service?')" title="Activated"><i class="icon-lock4"></i></a>
                                                            @else
                                                            <a href="{{action('Customer\CustomerController@service_activate', ['id' => $row->servicesID])}}" class="btn btn-xs btn-default no-padding mr-5 ediBtn"  onclick="return confirm('Are you sure to activate this service?')"  title="Deactivated"><i class="icon-unlocked"></i></a>
                                                        @endif

                                                        <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                                                data-id="{{$row->servicesID}}"
                                                                data-package="{{$row->packageID}}"
                                                                data-amount="{{$row->billingAmount}}"
                                                                data-dish="{{$row->dishType}}"
                                                                data-card="{{$row->dishCard}}"
                                                                data-box="{{$row->dishBox}}"
                                                                data-pac="{{$row->dishP}}"
                                                                data-toggle="modal"
                                                                data-target="#ediModal"
                                                                title="Edit"><i class="icon-pencil5"></i></button>
                                                        <a class="btn btn-xs btn-danger no-padding" href="{{action('Customer\CustomerController@service_del', ['id' => $row->servicesID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6"><h4 class="mt-20 mb-5"><i class="icon-arrow-right15"></i> Balance Transaction</h4></div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-warning  mb-5 mt-20" data-toggle="modal" data-target="#dueModal"><b>Running Balance:</b> {{money($table->balance)}}</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered  table-condensed table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Cash IN</th>
                                            <th>Cash OUT</th>
                                            <th>TransactionType</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $transaction = $table->transaction()->orderBy('cusTransactionID', 'DESC')->where('descriptions', 'like', '%General%')->get();
                                        @endphp
                                        @foreach($transaction as $row)
                                            <tr>
                                                <td>{{pub_date($row->created_at)}}</td>
                                                <td>{{money($row->amountIN)}}</td>
                                                <td>{{money($row->amountOut)}}</td>

                                                @php
                                                    if($row->descriptions != ''){
                                                        $bal_type = unserialize($row->descriptions);
                                                        $transactionType = $bal_type['transactionType'];
                                                    }else{
                                                        $transactionType = '';
                                                    }

                                                @endphp
                                                <td>{{$transactionType}}</td>
                                                <td class="text-right">
                                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtnBalance"
                                                            data-id="{{$row->cusTransactionID}}"
                                                            data-in="{{$row->amountIN}}"
                                                            data-out="{{$row->amountOut}}"
                                                            data-transaction="{{$transactionType}}"
                                                            data-types="{{$row->transactionType}}"
                                                            data-toggle="modal"
                                                            data-target="#ediDueModal"
                                                            title="Edit"><i class="icon-pencil5"></i></button>
                                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Customer\CustomerController@balance_del', ['id' => $row->cusTransactionID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <!--Customer Complain Box-->
                            <div class="row">
                                <div class="col-md-6"><h4 class="mt-20 mb-5"><i class="icon-arrow-right15"></i> Customer Complain Box</h4></div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-info  mb-5 mt-20" data-toggle="modal" data-target="#complainModal"><i class="icon-bubble-lines3"></i> Add Complain</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Complain Descriptions</th>
                                            <th>Status</th>
                                            <th class="text-right">Del</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $complain = $table->complain()->orderBy('complainID', 'DESC')->get();
                                        @endphp
                                        @foreach($complain as $row)
                                            <tr>
                                                <td>{{pub_date($row->created_at)}}<br>
                                                    <small class="text-muted text-size-mini">({{$row->created_at->diffForHumans()}})</small>
                                                </td>
                                                <td>{{$row->descriptions}}</td>
                                                <td>
                                                    <a class="btn btn-xs {{($row->status == 'Incomplete' ? 'text-danger':'text-success')}} no-padding" href="{{action('Customer\CustomerController@complain_status', ['id' => $row->complainID])}}" onclick="return confirm('Are you sure to change status?')" title="">{{$row->status}}</a>
                                                </td>
                                                <td class="text-right"><a class="btn btn-xs btn-danger no-padding" href="{{action('Customer\CustomerController@complain_del', ['id' => $row->complainID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/Customer Complain Box-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var amount = $(this).find(':selected').data('amount')
            $('.billing_amount').val(amount);

            $('.service_select').change(function () {
                var amount = $(this).find(':selected').data('amount')
                $('.billing_amount').val(amount);
            });



            var typess = $('.p_type').val();
            cadrs(typess);
            $('.p_type').change(function () {
                var types = $(this).val();
                cadrs(types);
            });
        });

        $(function () {
                $('.ediBtn').click(function () {
                    var id = $(this).data('id');
                    var package = $(this).data('package');
                    var amount = $(this).data('amount');
                    var dish = $(this).data('dish');
                    var card = $(this).data('card');
                    var pac = $(this).data('pac');
                    var box = $(this).data('box');


                    $('#ediIDP').val(id);
                    $('#ediModal [name=packageID]').val(package);
                    $('#ediModal [name=billingAmount]').val(amount);
                    $('#ediModal [name=dishType]').val(dish);
                    $('#ediModal [name=dishP]').val(pac);

                    $('.service_select2').change(function () {
                        var amount2 = $(this).find(':selected').data('amount')
                        $('.billing_amount2').val(amount2);
                    });

                    cadrs2(dish, card, box);

                    $('.p_type2').change(function () {
                        var types2 = $(this).val();
                        cadrs2(types2, card, box);
                    });


                });
        });

        //**********Edit Balance Transaction*********
        $(function () {
            $('.ediBtnBalance').click(function () {
                var id = $(this).data('id');
                var ins = $(this).data('in');
                var out = $(this).data('out');
                var transaction = $(this).data('transaction');
                var types = $(this).data('types');

                $('#ediIDBal').val(id);
                $('#ediDueModal [name=balanceType]').val(transaction);

                in_out_show(types, ins, out);
            });
        });
        //**********/Edit Balance Transaction*********

        function cadrs(dish_type) {
            if (dish_type == 'BOX'){
                $('.show_card').css('display', 'block');
                $('.dishCard').attr('required', 'required');

                $('.show_box').css('display', 'block');
                $('.dishBox').attr('required', 'required');
            }else{
                $('.show_card').css('display', 'none');
                $('.dishCard').removeAttr('required');

                $('.show_box').css('display', 'none');
                $('.dishBox').removeAttr('required');
            }
        }

        function cadrs2(dish_type, card, box) {
            if (dish_type == 'BOX'){
                $('.show_card2').css('display', 'block');
                $('.dishCard2').attr('required', 'required');
                $('#ediModal [name=dishCard]').val(card);

                $('.show_box2').css('display', 'block');
                $('.dishBox2').attr('required', 'required');
                $('#ediModal [name=dishBox]').val(box);
            }else{
                $('.show_card2').css('display', 'none');
                $('.dishCard2').removeAttr('required');
                $('#ediModal [name=dishCard]').val('');

                $('.show_box2').css('display', 'none');
                $('.dishBox2').removeAttr('required');
                $('#ediModal [name=dishBox]').val('');
            }
        }

        function in_out_show(types, ins, out) {
            if(types == 'IN'){
                $('#ediDueModal [name=due_balance]').val(0);
                $('#ediDueModal [name=add_balance]').val(ins);
                $('#ediDueModal [name=transactionType]').val('IN');
                $('.in_show').css('display', 'block');
                $('.out_show').css('display', 'none');
            }else{
                $('#ediDueModal [name=due_balance]').val(out);
                $('#ediDueModal [name=add_balance]').val(0);
                $('#ediDueModal [name=transactionType]').val('OUT');
                $('.in_show').css('display', 'none');
                $('.out_show').css('display', 'block');
            }
        }



    </script>
@endsection