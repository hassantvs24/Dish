@extends('layouts.print')

@section('title')
    Customer List Reports
@endsection

@section('content')

    <!-- invoice template -->

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> Customer List</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Customer List</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0">Customer</th>
                        <th class="p-5 pt-0 pb-0">Contact</th>
                        <th class="p-5 pt-0 pb-0">Area</th>
                        <th class="p-5 pt-0 pb-0" colspan="2">Address</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $activate = 0;
                        $deactivate = 0;
                    @endphp
                    @foreach($table as $row)
                        @php
                            $service = $row->service()->orderBy('servicesID', 'DESC')->get();
                        @endphp
                        <tr>
                            <td class="p-5 pt-0 pb-0">{{$row->name}}</td>
                            <td class="p-5 pt-0 pb-0">{{$row->contact}}</td>
                            <td class="p-5 pt-0 pb-0">{{$row->area->name ?? ''}}</td>
                            <td class="p-5 pt-0 pb-0" colspan="2">{{$row->address}}</td>
                        </tr>
                        <tr class="bg-info-800">
                            <th class="p-5 pt-0 pb-0 text-center">Package</th>
                            <th class="p-5 pt-0 pb-0 text-center">Type</th>
                            <th class="p-5 pt-0 pb-0 text-center">Card</th>
                            <th class="p-5 pt-0 pb-0 text-center">Box</th>
                            <th class="p-5 pt-0 pb-0 text-center">Status</th>
                        </tr>
                        @foreach($service as $rows)
                            <tr class="bg-info-300">
                                <td class="p-5 pt-0 pb-0 text-center">{{$rows->package->name ?? ''}}</td>
                                <td class="p-5 pt-0 pb-0 text-center">{{$rows->dishType ?? ''}}</td>
                                <td class="p-5 pt-0 pb-0 text-center">{{$rows->dishCard ?? ''}}</td>
                                <td class="p-5 pt-0 pb-0 text-center">{{$rows->dishBox ?? ''}}</td>
                                <td class="p-5 pt-0 pb-0 text-center">{{$rows->status ?? ''}}</td>
                            </tr>

                            @php
                                if($rows->status == 'Active'){
                                    $activate++;

                                }else{
                                    $deactivate++;
                                }
                            @endphp

                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right" colspan="4">Total</th>
                            <td>{{$table->count()}}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Active </th>
                            <td>{{$activate}}</td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="4">Dative</th>
                            <td>{{$deactivate}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection