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
        <div class="details singleColumn">
            <!-- data list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>@lang('main.orders')</h2>
{{--                    <a href="{{ route('order.create') }}" class="btn">Add new +</a>--}}
                </div>
                <form method="get" action="{{ route('order.index') }}" class="filter">
                    <div class="filter__input">
                        <input placeholder="@lang('main.name')..." name="name" type="text"
                               @if(!empty(request()->get('name'))) value="{{ request()->get('name') }}"@endif >
                    </div>
                    <button class="filter__button" type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                        @lang('main.search')
                    </button>
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>#id</td>
                        <td>@lang('main.name')</td>
                        <td>@lang('main.phone')</td>
                        <td>@lang('main.created_date')</td>
                        <td>@lang('main.actions')</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('order.edit', $item->id) }}">
                                    <ion-icon name="pencil-outline"></ion-icon>
                                </a>
                                <a onclick="openModal({{ $item->id }})">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal content -->
                        <div id="modal_container{{ $item->id }}" class="modal-container">
                            <div class="modal">
                                <div class="modal__header">
                                    <h2>@lang('main.confirm_action')</h2>
                                    <a class="modal__close" href="#" onclick="closeModal({{ $item->id }})"
                                       id="close{{ $item->id }}">
                                        <ion-icon name="close-outline"></ion-icon>
                                    </a>
                                </div>
                                <form method="post" action="{{ route('order.destroy', $item->id) }}"
                                      class="modal__form">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delete">
                                        <button class="modal__delete" type="submit">
                                            @lang('main.delete')
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                @if(!empty($orders->appends(request()->except(['page', '_token']))->previousPageUrl()))
                    <a href="{{ $orders->previousPageUrl() }}">&laquo;</a>
                @endif
                @if($orders->currentPage() > 3)
                    <a href="{{ $orders->url(1) }}">1</a>
                @endif
                @if($orders->currentPage() > 4)
                    <a>...</a>
                @endif
                @if($orders->currentPage() > 2)
                    <a href="{{ $orders->url($orders->currentPage() - 2) }}">{{ $orders->currentPage() - 2 }}</a>
                @endif
                @if(!empty($orders->previousPageUrl()))
                    <a href="{{ $orders->previousPageUrl() }}">{{ $orders->currentPage() - 1 }}</a>
                @endif
                <a href="#" class="active">{{ $orders->currentPage() }}</a>
                @if($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}">{{ $orders->currentPage() + 1 }}</a>
                @endif
                @if(($orders->lastPage() - $orders->currentPage()) > 2)
                    <a href="{{ $orders->url($orders->currentPage() + 2) }}">{{ $orders->currentPage() + 2 }}</a>
                @endif
                @if(($orders->lastPage() - $orders->currentPage()) > 3)
                    <a>...</a>
                @endif
                @if(!($orders->lastPage() == $orders->currentPage()) and ($orders->lastPage() - $orders->currentPage()) > 1)
                    <a href="{{ $orders->url($orders->lastPage()) }}">{{ $orders->lastPage() }}</a>
                @endif
                @if($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}">&raquo;</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function openModal(id) {
            let modal_container = document.getElementById('modal_container' + id);
            modal_container.classList.add('show')
        }

        function closeModal(id) {
            let modal_container = document.getElementById('modal_container' + id);
            modal_container.classList.remove('show')
        }
    </script>
@endsection
