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
                    <a href="{{ route('category.create') }}" class="btn">Add new +</a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
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
                                <a onclick="openModal({{ $category->id }})" href="#">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal content -->
                        <div id="modal_container" class="modal-container">
                            <div class="modal">
                                <div class="modal__header">
                                    <h2>Пожалуйста подтвердите действие</h2>
                                    <a class="modal__close" href="#" onclick="closeModal()" id="close">
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
                @if(!empty($categories->previousPageUrl()))
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
        const open = document.getElementById('open');
        const modal_container = document.getElementById('modal_container');
        const close = document.getElementById('close');

        function openModal(id) {
            modal_container.classList.add('show')
        }
        function closeModal() {
            modal_container.classList.remove('show')
        }

    </script>
@endsection
