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

        <!-- cards -->
        {{--@include('admin.templates.cards')--}}
        <div class="details singleColumn">
            <!-- data list -->
            <div class="itemsCard">
                <div class="cardHeader">
                    <h2>@lang('main.edit_comfort')</h2>
                </div>

                <div class="form">
                    <form method="post" action="{{ route('comfort.update', $comfort->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.pages.comfort.form')
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
