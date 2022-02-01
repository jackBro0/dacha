<div class="form__input">
    <label>
        Name
    </label>
    <input name="name" type="text" @if(!empty(old('name'))) value="{{ old('name') }}"
           @elseif(!empty($orders->name)) value="{{ $orders->name }}" @endif >
</div>

<div class="form__input">
    <label>
        Phone
    </label>
    <input name="phone" type="text" @if(!empty(old('phone'))) value="{{ old('phone') }}"
           @elseif(!empty($orders->phone)) value="{{ $orders->phone }}" @endif >
</div>

<div class="form__input">
    <label for="description">
        Description
    </label>
    <textarea id="description" name="description" rows="8" cols="80">@if(!empty(old('description'))){{ old('description') }}@elseif(!empty($orders->description)){{ $orders->description }}@endif</textarea>
</div>

<div class="form__btn">
    <button type="submit">submit</button>
</div>
