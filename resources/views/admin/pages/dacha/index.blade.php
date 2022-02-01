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
                    <h2>Locations</h2>
                    <a href="{{ route('dacha.create') }}" class="btn">Add new +</a>
                </div>
                <form method="get" action="{{ route('dacha.index') }}" class="filter">
                    <div class="filter__input">
                        <input placeholder="name..." name="name" type="text"
                               @if(!empty(request()->get('name'))) value="{{ request()->get('name') }}"@endif >
                    </div>
                    <div class="filter__select">
                        <select name="category_id">
                            <option></option>
                            @foreach($categories as $category)
                                    <option @if(!empty(request()->get('category_id')) and request()->get('category_id') == $category->id) selected @endif
                                            value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="filter__button" type="submit">
                        <ion-icon name="search-outline"></ion-icon>
                        search
                    </button>
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>#id</td>
                        <td>Name</td>
                        <td>image</td>
                        <td>Location</td>
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
                                    @if(!empty($item->images[0]->image_path))
                                        <img src="/{{ $item->images[0]->image_path }}">
                                    @else
                                        <img src="/assets/img/default.png">
                                    @endif
                                </div>
                            </td>

                            <td>
                                @if(!empty($item->category->name))
                                    {{ $item->category->name }}
                                @else
                                    not found
                                @endif
                            </td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('dacha.edit', $item->id) }}">
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
                                    <h2>Пожалуйста подтвердите действие</h2>
                                    <a class="modal__close" href="#" onclick="closeModal({{ $item->id }})"
                                       id="close{{ $item->id }}">
                                        <ion-icon name="close-outline"></ion-icon>
                                    </a>
                                </div>
                                <form method="post" action="{{ route('dacha.destroy', $item->id) }}"
                                      class="modal__form">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delete">
                                        <button class="modal__delete" type="submit">
                                            Delete
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
                @if(!empty($dacha->appends(request()->except(['page', '_token']))->previousPageUrl()))
                    <a href="{{ $dacha->previousPageUrl() }}">&laquo;</a>
                @endif
                @if($dacha->currentPage() > 3)
                    <a href="{{ $dacha->url(1) }}">1</a>
                @endif
                @if($dacha->currentPage() > 4)
                    <a>...</a>
                @endif
                @if($dacha->currentPage() > 2)
                    <a href="{{ $dacha->url($dacha->currentPage() - 2) }}">{{ $dacha->currentPage() - 2 }}</a>
                @endif
                @if(!empty($dacha->previousPageUrl()))
                    <a href="{{ $dacha->previousPageUrl() }}">{{ $dacha->currentPage() - 1 }}</a>
                @endif
                <a href="#" class="active">{{ $dacha->currentPage() }}</a>
                @if($dacha->hasMorePages())
                    <a href="{{ $dacha->nextPageUrl() }}">{{ $dacha->currentPage() + 1 }}</a>
                @endif
                @if(($dacha->lastPage() - $dacha->currentPage()) > 2)
                    <a href="{{ $dacha->url($dacha->currentPage() + 2) }}">{{ $dacha->currentPage() + 2 }}</a>
                @endif
                @if(($dacha->lastPage() - $dacha->currentPage()) > 3)
                    <a>...</a>
                @endif
                @if(!($dacha->lastPage() == $dacha->currentPage()) and ($dacha->lastPage() - $dacha->currentPage()) > 1)
                    <a href="{{ $dacha->url($dacha->lastPage()) }}">{{ $dacha->lastPage() }}</a>
                @endif
                @if($dacha->hasMorePages())
                    <a href="{{ $dacha->nextPageUrl() }}">&raquo;</a>
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
