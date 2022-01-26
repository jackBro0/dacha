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
        {{--@include('admin.templates.cards')--}}
        <div class="details singleColumn">
            <!-- data list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Locations</h2>
                    <a href="{{ route('dacha.create') }}" class="btn">Add new +</a>
                </div>
                <table>
                    <thead>
                    <tr>
                        <td>#id</td>
                        <td>Name</td>
                        <td>image</td>
                        <td>created date</td>
                        <td>actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dacha as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="imageColumn">
                                <div class="imgBx">
{{--                                    <img src="{{ $item->image_path }}">--}}
                                </div>
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('dacha.edit', $item->id) }}">
                                    <ion-icon name="pencil-outline"></ion-icon>
                                </a>
                                <a href="{{ route('dachaDelete', $item->id) }}">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
