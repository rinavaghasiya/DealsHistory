@extends('admin.header_footer')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-right">
                                <a href="{{ url('index') }}" class="btn btn-primary" style="">Import Excel Data</a>
                                <a href="{{ url('export') }}" class="btn btn-primary" style="">Export Excel Data</a>
                            </div>
                            <div class="table-responsive">
                               
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Deal</th>
                                            <th>Ids</th>
                                            <th>Order</th>
                                            <th>Position</th>
                                            <th>Login</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Type</th>
                                            <th>Entry</th>
                                            <th>Symbol</th>
                                            <th>Volume</th>
                                            <th>Price</th>
                                            <th>S / L</th>
                                            <th>T / P</th>
                                            <th>Reason</th>
                                            <th>Commission</th>
                                            <th>Fee</th>
                                            <th>Swap</th>
                                            <th>Profit</th>
                                            <th>Dealer</th>
                                            <th>Currency</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <?php $deal = App\Models\DealHistory::get();
                                    ?>
                                    <tbody>
                                        <?php
                                        $volume = 0;
                                        $commission = 0;
                                        $fee = 0;
                                        $swap = 0;
                                        $profit = 0;
                                        $crl = 'RSV';
                                        
                                        ?>

                                        @foreach ($deal as $data)
                                            <?php
                                            // $volume += intval($data->Volume);
                                            $volume +=  $data->Volume;
                                            $commission += (float) $data->Commission;
                                            $fee += (int) $data->Fee;
                                            $swap += (int) $data->Swap;
                                            $profit += (float) $data->Profit;
                                            ?>
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->Deal }}</td>
                                                <td>{{ $data->Ids }}</td>
                                                <td>{{ $data->Orders }}</td>
                                                <td>{{ $data->Position }} </td>
                                                <td>{{ $data->Login }}</td>
                                                <td>{{ $data->Name }}O</td>
                                                <td>{{ $data->Time }}</td>
                                                <td>{{ $data->Type }}</td>
                                                <td>{{ $data->Entry }}</td>
                                                <td>{{ $data->Symbol }}</td>
                                                <td>{{ $data->Volume }}</td>
                                                <td>{{ $data->Price }}</td>
                                                <td>{{ $data->SL }}</td>
                                                <td>{{ $data->TP }}</td>
                                                <td>{{ $data->Reason }}</td>
                                                <td>{{ $data->Commission }}</td>
                                                <td>{{ $data->Fee }}</td>
                                                <td>{{ $data->Swap }}</td>
                                                <td>{{ $data->Profit }}</td>
                                                <td>{{ $data->Dealer }}</td>
                                                <td>{{ $data->Currency }}</td>
                                                <td>{{ $data->Comment }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $volume; ?></td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td><?php echo $commission; ?></td>
                                            <td><?php echo $fee; ?></td>
                                            <td><?php echo $swap; ?></td>
                                            <td><?php echo $profit; ?></td>
                                            <td></td>
                                            <td><?php echo $crl; ?></td>
                                            <td></td>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #/ container -->
    </div>
@endsection
