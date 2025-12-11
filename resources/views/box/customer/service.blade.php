@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New Service/Package for Billing</h5>
                </div>

                <form action="{{action('Customer\CustomerController@service_save')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="customerID" value="{{$table->customerID}}">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Select Package</label>
                            <div class="col-lg-9">
                                <select class="form-control service_select" name="packageID">
                                    @foreach($package as $row)
                                        <option value="{{$row->packageID}}" data-amount="{{$row->packageAmount}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Billing Amount</label>
                            <div class="col-lg-9">
                                <input class="form-control billing_amount" name="billingAmount" placeholder="Billing Amount" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Package Type</label>
                            <div class="col-lg-9">
                                <select class="form-control p_type" name="dishType">
                                    <option value="ANALOG">Analog</option>
                                    <option value="BOX">Box</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group show_card" style="display: none;">
                            <label class="col-lg-3 control-label">Card Number</label>
                            <div class="col-lg-9">
                                <input class="form-control dishCard" name="dishCard" placeholder="Card Number" type="text">
                            </div>
                        </div><br>

                        <div class="form-group show_box" style="display: none;">
                            <label class="col-lg-3 control-label">Box Number</label>
                            <div class="col-lg-9">
                                <input class="form-control dishBox" name="dishBox" placeholder="Box Number" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Package User Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="dishP">
                                    <option value="">Select Package User Type</option>
                                    <option value="Silver">Silver</option>
                                    <option value="GOLD">GOLD</option>
                                    <option value="Platinum">Platinum</option>
                                </select>
                            </div>
                        </div><br>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Service/Package for Billing</h5>
                </div>

                <form action="{{action('Customer\CustomerController@service_edi')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediIDP" name="id">
                    <input type="hidden" name="customerID" value="{{$table->customerID}}">

                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Select Package</label>
                            <div class="col-lg-9">
                                <select class="form-control service_select2" name="packageID">
                                    @foreach($package as $row)
                                        <option value="{{$row->packageID}}" data-amount="{{$row->packageAmount}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Billing Amount</label>
                            <div class="col-lg-9">
                                <input class="form-control billing_amount2" name="billingAmount" placeholder="Billing Amount" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Package Type</label>
                            <div class="col-lg-9">
                                <select class="form-control p_type2" name="dishType">
                                    <option value="ANALOG">Analog</option>
                                    <option value="BOX">Box</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group show_card2" style="display: none;">
                            <label class="col-lg-3 control-label">Card Number</label>
                            <div class="col-lg-9">
                                <input class="form-control dishCard2" name="dishCard" placeholder="Card Number" type="text">
                            </div>
                        </div><br>

                        <div class="form-group show_box2" style="display: none;">
                            <label class="col-lg-3 control-label">Box Number</label>
                            <div class="col-lg-9">
                                <input class="form-control dishBox2" name="dishBox" placeholder="Box Number" type="text">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Package User Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="dishP">
                                    <option value="">Select Package User Type</option>
                                    <option value="Silver">Silver</option>
                                    <option value="GOLD">GOLD</option>
                                    <option value="Platinum">Platinum</option>
                                </select>
                            </div>
                        </div><br>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->


    <!-- Basic modal -->
    <div id="dueModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-calculator3"></i> Balance Adjustment</h5>
                </div>

                <form action="{{action('Customer\CustomerController@balance_adjust')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="customerID" value="{{$table->customerID}}">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Balance Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="balanceType">
                                    <option value="Adjustment">Adjustment</option>
                                    <option value="Opening">Opening</option>
                                    <option value="Advanced">Advanced Payment</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Balance Due (-)</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="due_balance" placeholder="Balance Due" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Balance Add (+)</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="add_balance" placeholder="Balance Add" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div><br>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

    <!-- Basic modal -->
    <div id="ediDueModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-calculator3"></i> Edit Balance Adjustment</h5>
                </div>

                <form action="{{action('Customer\CustomerController@balance_edi_adjust')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" id="ediIDBal" name="id">
                    <input type="hidden" name="transactionType">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Balance Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="balanceType">
                                    <option value="Adjustment">Adjustment</option>
                                    <option value="Opening">Opening</option>
                                    <option value="Advanced">Advanced Payment</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="form-group out_show" style="display: block">
                            <label class="col-lg-3 control-label">Balance Due (-)</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="due_balance" placeholder="Balance Due" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div>

                        <div class="form-group in_show" style="display: block">
                            <label class="col-lg-3 control-label">Balance Add (+)</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="add_balance" placeholder="Balance Add" type="number" step="any" min="0" value="0" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic modal -->
    <div id="complainModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-bubble-lines3"></i> Customer Complain Box</h5>
                </div>

                <form action="{{action('Customer\CustomerController@complain')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="customerID" value="{{$table->customerID}}">
                    <div class="modal-body">

                        <div class="form-group in_show" style="display: block">
                            <label class="col-lg-6 control-label">Write Customer Complain</label>
                            <div class="col-lg-12">
                                <textarea rows="4" class="form-control" name="descriptions" placeholder="Write Customer Complain here ....."></textarea>
                            </div>
                        </div><br>
                        <div style="height: 120px;"></div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

@endsection