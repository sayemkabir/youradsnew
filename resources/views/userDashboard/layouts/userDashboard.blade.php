@extends('userDashboard.master')
@section('userDashboard')


<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Balance</h3><br>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ {{auth('user')->user()->balance}}</h2>

                        <br>

                        <a href="{{route('balance.withdraw.form')}}" type="button" class="btn mb-1 btn-primary btn-lg">Withdraw</a>

                    </div>
                    {{--                            <button type="button" class="btn mb-1 btn-rounded btn-primary" disabled="disabled">Primary</button>--}}
                    <span class="float-md-right display-3 opacity-5">   <i class="cc BTC-alt" title="BTC"></i> </span>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-2  ">
                <div class="card-body">
                    <h3 class="card-title text-white">Purchase Balance</h3><br>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ {{auth('user')->user()->deposit_balance}}</h2>

                        <br>

                        <a href="{{route('balance.deposit.form')}}" type="button" class="btn mb-1 btn-primary btn-lg">Deposit</a>

                    </div>
                    {{--                            <button type="button" class="btn mb-1 btn-rounded btn-primary" disabled="disabled">Primary</button>--}}
                    <span class="float-md-right display-3 opacity-5">   <i class="fa fa-cart-arrow-down"></i> </span>

                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                <tr>
                                    <th>Customers</th>
                                    <th>Product</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Payment Method</th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="./images/avatar/1.jpg" class=" rounded-circle mr-3" alt="">Sarah Smith</td>
                                    <td>iPhone X</td>
                                    <td>
                                        <span>United States</span>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">10 sec ago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="./images/avatar/2.jpg" class=" rounded-circle mr-3" alt="">Walter R.</td>
                                    <td>Pixel 2</td>
                                    <td><span>Canada</span></td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">50 sec ago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="./images/avatar/3.jpg" class=" rounded-circle mr-3" alt="">Andrew D.</td>
                                    <td>OnePlus</td>
                                    <td><span>Germany</span></td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">10 sec ago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="./images/avatar/6.jpg" class=" rounded-circle mr-3" alt=""> Megan S.</td>
                                    <td>Galaxy</td>
                                    <td><span>Japan</span></td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">10 sec ago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="./images/avatar/4.jpg" class=" rounded-circle mr-3" alt=""> Doris R.</td>
                                    <td>Moto Z2</td>
                                    <td><span>England</span></td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">10 sec ago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="./images/avatar/5.jpg" class=" rounded-circle mr-3" alt="">Elizabeth W.</td>
                                    <td>Notebook Asus</td>
                                    <td><span>China</span></td>
                                    <td>
                                        <div>
                                            <div class="progress" style="height: 6px">
                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                    <td>
                                        <span>Last Login</span>
                                        <span class="m-0 pl-3">10 sec ago</span>
                                    </td>
                                </tr>
                                </tbody>
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
