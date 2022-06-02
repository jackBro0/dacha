<div class="form__input">
    <label>
        @lang('main.name_uz')
    </label>
    @error('name_uz')
    <span class="validationError">{{ $message  }}</span>
    @enderror
    <input name="name_uz" type="text" @if(!empty(old('name_uz'))) value="{{ old('name_uz') }}"
           @elseif(!empty($comfort->name_uz)) value="{{ $comfort->name_uz }}" @endif >
</div>

<div class="form__input">
    <label>
        @lang('main.name_ru')
    </label>
    @error('name_ru')
    <span class="validationError">{{ $message  }}</span>
    @enderror
    <input name="name_ru" type="text" @if(!empty(old('name_ru'))) value="{{ old('name_ru') }}"
           @elseif(!empty($comfort->name_ru)) value="{{ $comfort->name_ru }}" @endif >
</div>
<div class="form__input">
    <label>
        Иконка
    </label>
    @error('name_ru')
    <span class="validationError">{{ $message  }}</span>
    @enderror
        <input type="file" name="icon">
</div>
<div class="form__btn">
    <button type="submit">@lang('main.save')</button>
</div>

@section('js')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
