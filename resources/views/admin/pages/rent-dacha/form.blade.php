<div class="form__input">
    <label>
        @lang('main.user_name')
    </label>
    @error('name')
    <span class="validationError">{{ $message  }}</span>
    @enderror
    <input name="name" type="text" @if(!empty(old('name'))) value="{{ old('name') }}"
           @elseif(!empty($orders->name)) value="{{ $orders->name }}" @endif >
</div>

<div class="form__input">
    <label>
        @lang('main.phone')
    </label>
    @error('phone')
    <span class="validationError">{{ $message  }}</span>
    @enderror
    <input name="phone" type="text" @if(!empty(old('phone'))) value="{{ old('phone') }}"
           @elseif(!empty($orders->phone)) value="{{ $orders->phone }}" @endif >
</div>

<div class="form__input">
    <label for="description">
        @lang('main.description')
    </label>
    @error('description')
    <span class="validationError">{{ $message  }}</span>
    @enderror
    <textarea id="description" name="description" rows="8" cols="80">@if(!empty(old('description'))){{ old('description') }}@elseif(!empty($orders->description)){{ $orders->description }}@endif</textarea>
</div>

<div class="form__btn">
    <button type="submit">@lang('main.save')</button>
</div>
