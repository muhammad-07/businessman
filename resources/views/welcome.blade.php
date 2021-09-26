@extends('layouts.app')

@section('content')
    <div class="container mw-100">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Final Report-1</div>

                    <div class="card-body">
                        <div class="">
                                        
                            <div>
                                <h3>Which bank account is used to transfer fund to each vendor</h3>
                            </div>

                        </div>
                    

                    <table class="
                            table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Vendor Name</th>
                                <th>Amount Transffered</th>
                                <th>Bank A/c.ID</th>
                                <th>Bank Code</th>
                                <th>Bank Name</th>
                                <th>Acount Number</th>
                            </tr>
                            @php
                                $total_transffered = 0;
                            @endphp
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
                                @php
                                    $total_transffered += $value['amount_transfered'];
                                @endphp
                            @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total Amount Transferred</th>
                                        <th>{{number_format($total_transffered)}}</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">Final Report-2</div>

                        <div class="card-body">
                            <div class="">
                                <div>
                                    <h3>Summary report of all banks with total amount transferred (in highest to lowest order)</h3>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <tr>
                                    <th>Bank A/c.ID</th>
                                    <th>Bank Code</th>
                                    <th>Bank Name</th>
                                    <th>Acount Number</th>
                                    <th>Total Transferred</th>
                                </tr>
                                @php
                                    $total_transffered = 0;
                                @endphp
                                @foreach ($transfers as $value)
                                    <tr>
                                        <td>{{ $value['bid'] }}</td>
                                        <td>{{ $value['transfered_bank'] }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['ac_no'] }}</td>
                                        <td>{{ $value['sum'] }}</td>
                                    </tr>
                                    @php
                                        $total_transffered += $value['sum'];
                                    @endphp
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Amount Transferred</th>
                                        <th>{{number_format($total_transffered)}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">Final Report-3</div>

                        <div class="card-body">
                            <div class="">
                                        
                            <div>
                                <h3>List of banks with total available balane after transfer to all vendors (highest to
                                    lowest balance) </h3>
                            </div>

                        </div>
                   

                    <table class="
                                table table-bordered">
                                <tr>

                                    <th>Bank A/c.ID</th>
                                    <th>Bank Code</th>
                                    <th>Bank Name</th>
                                    <th>Available Balance</th>
                                </tr>

                                @foreach ($available_balances as $available_balance)

                                    <tr>
                                        {{-- <td>{{ ++$i }}</td> --}}

                                        <td>{{ $available_balance['bank_ac_id'] }}</td>
                                        <td>{{ $available_balance['bank_name'] }}</td>
                                        <td>{{ $available_balance['ac_no'] }}</td>
                                        <td>{{ $available_balance['balance'] }}</td>
                                    </tr>
                                @endforeach
                                </table>

                            </div>
                        </div>


                        <div class="card mt-3">
                            <div class="card-header">Final Report-4</div>

                            <div class="card-body">
                                <div class="">
                                        
                            <div>
                                <h3>List of vendors who could not be paid due to lack of funds in set bank account</h3>
                            </div>

                        </div>
                    

                    <table class="
                                    table table-bordered">
                                    <tr>


                                        <th>Vendor Code</th>
                                        <th>Vendor Name</th>
                                        <th>Amount to be Transferred</th>
                                    </tr>

                                    @foreach ($remaining_payments as $remaining_payment)

                                        <tr>
                                            <td>{{ $remaining_payment['vendor_code'] }}</td>
                                            <td>{{ $remaining_payment['vendor_name'] }}</td>
                                            <td>{{ $remaining_payment['amount_to_transfered'] }}</td>

                                        </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endsection
