@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Final Report-2</div>

                    <div class="card-body">
                        <div class="row"">
                                <div class=" col-lg-12 margin-tb">
                            <div>
                                <h3>Summary report of all banks with total amount transferred (in highest to lowest order)</h3>
                            </div>

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

                        @foreach ($transfers as $value)
                            <tr>                               
                                <td>{{ $value['bid'] }}</td>
                                <td>{{ $value['transfered_bank'] }}</td>
                                <td>{{ $value['name'] }}</td>
                                <td>{{ $value['ac_no'] }}</td>
                                <td>{{ $value['sum'] }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
