@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Final Report-3</div>

                    <div class="card-body">
                        <div class="row"">
                                <div class=" col-lg-12 margin-tb">
                            <div>
                                <h3>Which bank account is used to transfer fund to each vendor</h3>
                            </div>

                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Vendor Name</th>
                            <th>Amount Transffered</th>
                            <th>Bank A/c.ID</th>
                            <th>Bank Code</th>
                            <th>Bank Name</th>
                            <th>Acount Number</th>
                        </tr>

                        @foreach ($rp1 as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value['vendor_name'] }}</td>
                                <td>{{ $value['amount_transfered'] }}</td>
                                <td>{{ $value['bank_ac_id'] }}</td>
                                <td>{{ $value['bank_code'] }}</td>
                                <td>{{ $value['bank_name'] }}</td>
                                <td>{{ $value['ac_no'] }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
