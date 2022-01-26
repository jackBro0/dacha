@extends('admin.main')

@section('content')
    <div class="main">

        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        @include('admin.templates.topbar')
        <!--user image-->
            <div class="user">
                <img src="/assets/img/user.png" alt="">
            </div>
        </div>

        <!-- cards -->
        @include('admin.templates.cards')
        <div class="details">
            <!-- data list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Payment</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tony Stark</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>Peter Parker</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status inprogress">In Progress</span></td>
                    </tr>
                    <tr>
                        <td>Dr Bruce Banner</td>
                        <td>$1,8970</td>
                        <td>Due</td>
                        <td><span class="status return">Return</span></td>
                    </tr>
                    <tr>
                        <td>Tony Stark</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>Peter Parker</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status inprogress">In Progress</span></td>
                    </tr>
                    <tr>
                        <td>Dr Bruce Banner</td>
                        <td>$1,8970</td>
                        <td>Due</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>Jeyms Bond</td>
                        <td>$1,8970</td>
                        <td>Due</td>
                        <td><span class="status return">Return</span></td>
                    </tr>
                    <tr>
                        <td>Tony Stark</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>Dr Bruce Banner</td>
                        <td>$1,8970</td>
                        <td>Due</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>Peter Parker</td>
                        <td>$1,8970</td>
                        <td>Paid</td>
                        <td><span class="status inprogress">In Progress</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- New Customers -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="imgBx">
                                <img src="./img/img8.jpg" alt="">
                            </div>
                        </td>
                        <td><h4>Rustam <br><span>Qorasuv</span></h4></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
