@extends('backend.welcome')
@section('operation')

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <form action="{{route('report.deposit')}}" method="GET">

        <div class="row">
            <div class="col-md-8">
                <div class="row" style="padding: 2px 47px;">

                    <div class="form-group col-md-4">
                        <label for="from"> Date from:</label>
                        <input value="{{$fromDate}}" id="from" type="date" class="form-control" name="from_date">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to"> Date to:</label>
                        <input value="{{$toDate}}" id="to" type="date" class="form-control" name="to_date">
                    </div>
                    <div style="padding: 31px 2px;" class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" onclick="printDiv()" class="btn btn-success">Print</button>

                    </div>
                </div>
            </div>


        </div>
    </form>

    <div id="printArea">
        <h4 style="color: cyan;padding: 0px 45px;">Deposit Report from {{$fromDate}} to {{$toDate}}</h4><br>
        <table style="padding: 0px 0px" class="table table-bordered table-hover ">

            <thead>


            <th scope="col">Payment Id</th>

            <th scope="col">User Name</th>
            <th scope="col">E-mail</th>


            <th scope="col">Requested Deposit Balance</th>
            <th scope="col">Payment Method</th>


            </thead>
            <tbody>

            @if(count($allBooking)>0)

                @foreach($allBooking as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->userDeposit->user_name}}</td>
                        <td>{{$data->userDeposit->email}}</td>
                        <td>{{$data->deposit_balance}}</td>
                        <td>{{$data->payment_method}}</td>





                        {{--                                @if($data->status=='pending')--}}

                        {{--                                    <a class="btn btn-success" href="{{route('withdraw.balance.update',$data->id)}}">Approve</a>--}}
                        {{--                                    <a class="btn btn-danger" href="{{route('withdraw.balance.update.deny',$data->id)}}">Deny</a>--}}


                        {{--                                @elseif($data->status=='denied')--}}

                        {{--                                    <a class="btn btn-success" href="{{route('withdraw.balance.update',$data->id)}}">Approve</a>--}}

                        {{--                                @elseif($data->status=='processed')--}}

                        {{--                                    <a class="btn btn-danger" href="{{route('withdraw.balance.update.deny.balance',$data->id)}}">Deny</a>--}}


                        {{--                                @endif--}}

                    </tr>
                @endforeach
            @else

                <center>
                    <h2 style="color: red">No data found!<br></h2>
                    <h4 style="color: aqua">please search again!</h4>
                </center>


            @endif



            </tbody>
        </table>

    </div>


    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>

    <br>

@endsection
