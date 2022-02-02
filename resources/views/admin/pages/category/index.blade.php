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
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>@lang('main.locations')</h2>
                    <a href="{{ route('category.create') }}" class="btn">@lang('main.add_new') +</a>
                </div>
                <form method="get" action="{{ route('category.index') }}" class="filter">
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
                        <td>@lang('main.image')</td>
                        <td>@lang('main.created_date')</td>
                        <td>@lang('main.actions')</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name_ru }}</td>
                            <td class="imageColumn">
                                <div class="imgBx">
                                    <img src="/{{ $category->image_path }}">
                                </div>
                            </td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}">
                                    <ion-icon name="pencil-outline"></ion-icon>
                                </a>
{{--                                <a href="{{ route('categoryDelete', $category->id) }}">--}}
                                <a onclick="openModal({{ $category->id }})" >
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal content -->
                        <div id="modal_container{{ $category->id }}" class="modal-container">
                            <div class="modal">
                                <div class="modal__header">
                                    <h2>Пожалуйста подтвердите действие</h2>
                                    <a class="modal__close" href="#" onclick="closeModal({{ $category->id }})" id="close{{ $category->id }}">
                                        <ion-icon name="close-outline"></ion-icon>
                                    </a>
                                </div>
                                <form method="post" action="{{ route('category.destroy', $category->id) }}" class="modal__form">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delete">
                                        <button class="modal__delete" type="submit">
                                            Delete <ion-icon name="trash-outline"></ion-icon>
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
                @if(!empty($categories->appends(request()->except(['page', '_token']))->previousPageUrl()))
                    <a href="{{ $categories->previousPageUrl() }}">&laquo;</a>
                @endif
                @if($categories->currentPage() > 3)
                    <a href="{{ $categories->url(1) }}">1</a>
                @endif
                @if($categories->currentPage() > 4)
                    <a>...</a>
                @endif
                @if($categories->currentPage() > 2)
                    <a href="{{ $categories->url($categories->currentPage() - 2) }}">{{ $categories->currentPage() - 2 }}</a>
                @endif
                @if(!empty($categories->previousPageUrl()))
                    <a href="{{ $categories->previousPageUrl() }}">{{ $categories->currentPage() - 1 }}</a>
                @endif
                <a href="#" class="active">{{ $categories->currentPage() }}</a>
                @if($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}">{{ $categories->currentPage() + 1 }}</a>
                @endif
                @if(($categories->lastPage() - $categories->currentPage()) > 2)
                    <a href="{{ $categories->url($categories->currentPage() + 2) }}">{{ $categories->currentPage() + 2 }}</a>
                @endif
                @if(($categories->lastPage() - $categories->currentPage()) > 3)
                    <a>...</a>
                @endif
                @if(!($categories->lastPage() == $categories->currentPage()) and ($categories->lastPage() - $categories->currentPage()) > 1)
                    <a href="{{ $categories->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a>
                @endif
                @if($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}">&raquo;</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function openModal(id) {
            let modal_container = document.getElementById('modal_container'+id);
            modal_container.classList.add('show')
        }
        function closeModal(id) {
            let modal_container = document.getElementById('modal_container'+id);
            modal_container.classList.remove('show')
        }

    </script>
@endsection
