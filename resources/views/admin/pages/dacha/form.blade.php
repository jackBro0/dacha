<div class="form__input">
    <label for="select1">
        Name
    </label>
    <select id="select1" name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form__input">
    <label>
        Name
    </label>
    <input name="name" type="text" @if(!empty(old('name'))) value="{{ old('name') }}"
           @elseif(!empty($dacha->name)) value="{{ $dacha->name }}" @endif >
</div>

<div class="form__input">
    <label>
        Bathroom count
    </label>
    <input name="bathroom_count" type="number" @if(!empty(old('bathroom_count'))) value="{{ old('bathroom_count') }}"
           @elseif(!empty($dacha->bathroom_count)) value="{{ $dacha->bathroom_count }}" @endif >
</div>

<div class="form__input">
    <label>
        Capacity
    </label>
    <input name="capacity" type="number" @if(!empty(old('capacity'))) value="{{ old('capacity') }}"
           @elseif(!empty($dacha->capacity)) value="{{ $dacha->capacity }}" @endif >
</div>

<div class="form__input">
    <label>
        Room count
    </label>
    <input name="room_count" type="number" @if(!empty(old('room_count'))) value="{{ old('room_count') }}"
           @elseif(!empty($dacha->room_count)) value="{{ $dacha->room_count }}" @endif >
</div>

<div class="form__input">
    <label>
        Price
    </label>
    <input name="cost" type="number" @if(!empty(old('cost'))) value="{{ old('cost') }}"
           @elseif(!empty($dacha->cost)) value="{{ $dacha->cost }}" @endif >
</div>

<div class="form__input">
    <label>
        Comforts
    </label>
    <input name="comforts[]" type="text" @if(!empty(old('comforts'))) value="{{ old('comforts') }}"
           @elseif(!empty($dacha->comforts)) value="{{ $dacha->comforts }}" @endif >
</div>

<div class="form__input">
    <label>
        Comforts
    </label>
    <input name="comforts[]" type="text" @if(!empty(old('comforts'))) value="{{ old('comforts') }}"
           @elseif(!empty($dacha->comforts)) value="{{ $dacha->comforts }}" @endif >
</div>

<div class="form__input">
    <label>
        Comforts
    </label>
    <input name="comforts[]" type="text" @if(!empty(old('comforts'))) value="{{ old('comforts') }}"
           @elseif(!empty($dacha->comforts)) value="{{ $dacha->comforts }}" @endif >
</div>

<div class="form__input">
    <label>
        Comforts
    </label>
    <input name="comforts[]" type="text" @if(!empty(old('comforts'))) value="{{ old('comforts') }}"
           @elseif(!empty($dacha->comforts)) value="{{ $dacha->comforts }}" @endif >
</div>

<div class="form__input fileInput">
    <label for="fileInput">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput" name="image_path[]" type="file">
</div>

<div class="form__input fileInput">
    <label for="fileInput2">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput2" name="image_path[]" type="file">
</div>

<div class="form__input fileInput">
    <label for="fileInput3">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput3" name="image_path[]" type="file">
</div>

<div class="form__input fileInput">
    <label for="fileInput4">
        <ion-icon name="cloud-upload-outline"></ion-icon>
        <span>upload</span>
    </label>
    <input id="fileInput4" name="image_path[]" type="file">
</div>

<div class="form__btn">
    <button type="submit">submit</button>
</div>
