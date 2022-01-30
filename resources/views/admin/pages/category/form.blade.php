<div class="form__input">
    <label>
        Name
    </label>
    <input name="name" type="text" @if(!empty(old('name'))) value="{{ old('name') }}"
           @elseif(!empty($category->name)) value="{{ $category->name }}" @endif >
</div>
<div class="form__input">
    <label for="description">
        Description
    </label>
    <textarea id="description" name="description" rows="8" cols="80">@if(!empty(old('description'))){{ old('description') }}@elseif(!empty($category->description)){{ $category->description }}@endif</textarea>
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
