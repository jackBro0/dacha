<div class="form__input">
    <label>
        Name
    </label>
    <input name="name" type="text" @if(!empty(old('name'))) value="{{ old('name') }}" @elseif(!empty($category->name)) value="{{ $category->name }}"  @endif >
</div>
<div class="form__input fileInput">
    <label for="fileInput">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput" name="image_path" type="file">
</div>
<div class="form__btn">
    <button type="submit">submit</button>
</div>
