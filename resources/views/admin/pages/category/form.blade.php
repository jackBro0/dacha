<div class="form__input">
    <label>
        Name Uz
    </label>
    <input name="name_uz" type="text" @if(!empty(old('name_uz'))) value="{{ old('name_uz') }}"
           @elseif(!empty($category->name_uz)) value="{{ $category->name_uz }}" @endif >
</div>

<div class="form__input">
    <label>
        Name Ru
    </label>
    <input name="name_ru" type="text" @if(!empty(old('name_ru'))) value="{{ old('name_ru') }}"
           @elseif(!empty($category->name_ru)) value="{{ $category->name_ru }}" @endif >
</div>

<div class="form__input">
    <label for="description_uz">
        Description Uz
    </label>
    <textarea id="description_uz" name="description_uz" rows="8" cols="80">@if(!empty(old('description_uz'))){{ old('description_uz') }}@elseif(!empty($category->description_uz)){{ $category->description_uz }}@endif</textarea>
</div>

<div class="form__input">
    <label for="description_ru">
        Description Ru
    </label>
    <textarea id="description_ru" name="description_ru" rows="8" cols="80">@if(!empty(old('description_ru'))){{ old('description_ru') }}@elseif(!empty($category->description_ru)){{ $category->description_ru }}@endif</textarea>
</div>

<div class="uploadImage">
    <img id="output" @if(!empty($category->image_path)) src="/{{ $category->image_path }}" @else src="/assets/img/default.png" @endif>
</div>
<div class="form__input fileInput">
    <label for="fileInput">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput" name="image_path" type="file" onchange="loadFile(event)">
</div>
<div class="form__btn">
    <button type="submit">submit</button>
</div>

@section('js')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
