@extends('admin.main')

@section('content')
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!--user image-->
            <div class="user">
                <img src="/assets/img/user.png" alt="">
            </div>
        </div>
        <div class="details singleColumn">
            <!-- data list -->
            <div class="itemsCard">
                <div class="cardHeader">
                    <h2>Order create</h2>
                </div>
                <div class="form">
                    <form method="post" action="{{ route('passwordChange') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form__input">
                            <label>
                                Current password
                            </label>
                            <input name="current_password" type="password">
                        </div>
                        <div class="form__input">
                            <label>
                                New password
                            </label>
                            <input name="password" type="password">
                        </div>
                        <div class="form__input">
                            <label>
                                Confirm new password
                            </label>
                            <input name="confirm" type="password">
                        </div>
                        <div class="form__btn">
                            <button type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
