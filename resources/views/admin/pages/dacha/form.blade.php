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
@if(!empty($dacha->comforts))
    <div id="multipleInput" class="multipleInput">
        @foreach($dacha->comforts as $comfort)
            <div id="comports{{ $loop->index }}" class="form__input">
                <label>
                    Comforts
                </label>
                <input value="{{ $comfort }}" name="comforts[]" type="text">
                @if (!$loop->first)
                    <button type="button" onclick="removeInput('s'+{{ $loop->index }})" class="removeButton inputRemove">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div id="multipleInput" class="multipleInput">
        <div class="form__input">
            <label>
                Comforts
            </label>
            <input name="comforts[]" type="text" value="{{ old('comforts') }}">
        </div>
    </div>
@endif
<button onclick="addInput()" class="addButton" type="button">
    <ion-icon name="add-outline"></ion-icon>
</button>
@if(!empty($dacha->images))
    <div id="reqs">
        @foreach($dacha->images as $images)
            <div id="uploads{{ $loop->index }}">
                <input name="exist_image[]" type="hidden" value="{{ $images->id }}">
                <div class="uploadImage">
                    <img id="outputs{{ $loop->index }}" @if(!empty($images->image_path)) src="/{{ $images->image_path }}"
                         @else src="/assets/img/default.png" @endif>
                </div>
                <div class="form__input fileInput">
                    <label for="fileInputs{{ $loop->index }}">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        <span>upload</span>
                    </label>
                    <input id="fileInputs{{ $loop->index }}" onchange="uploadImg('s'+{{ $loop->index  }})" name="exist_image_path[{{ $images->id }}]" type="file">
                    @if (!$loop->first)
                        <button type="button" onclick="removeElement('s'+{{ $loop->index }})" class="removeButton">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@else
    <div id="reqs">
        <div id="upload">
            <div class="uploadImage">
                <img id="output0" src="/assets/img/default.png">
            </div>

            <div class="form__input fileInput">
                <label for="fileInput0">
                    <ion-icon name="cloud-upload-outline"></ion-icon>
                    <span>upload1</span>
                </label>
                <input onchange="uploadImg(0)" id="fileInput0" name="image_path[]" type="file">
            </div>
        </div>
    </div>
@endif
<button class="addButton" type="button" onclick="add()">
    <ion-icon name="add-outline"></ion-icon>
</button>

<div class="form__btn">
    <button type="submit">submit</button>
</div>

@section('js')
    <script>
        var reqs_id = 0;
        var addCount = 0;

        function addInput() {
            addCount++;
            var element = `<div id="comport` + addCount + `" class="form__input">
                                <label>
                                    Comforts
                                </label>
                                <input name="comforts[]" type="text">
                                <button type="button" onclick="removeInput(` + addCount + `)" class="removeButton inputRemove">
                                    <ion-icon name="close-outline"></ion-icon>
                                </button>
                            </div>`

            $("#multipleInput").append(element)
        }

        function removeInput(id) {
            console.log("#comport" + id)
            $("#comport" + id).remove();
        }

        function uploadImg(id) {
            var file = $("#fileInput" + id).get(0).files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    $("#output" + id).attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function removeElement(id) {
            $("#upload" + id).remove();
        }

        function add() {
            reqs_id++; // increment reqs_id to get a unique ID for the new element

            //create textbox
            var input = `<div id="upload` + reqs_id + `">
            <div class="uploadImage">
                <img id="output` + reqs_id + `" src="/assets/img/default.png">
            </div>

            <div class="form__input fileInput">
                <label for="fileInput` + reqs_id + `">
                    <ion-icon name="cloud-upload-outline"></ion-icon>
                    <span>upload</span>
                </label>
                <input onchange="uploadImg(` + reqs_id + `)" id="fileInput` + reqs_id + `" name="image_path[]" type="file">
                <button type="button" onclick="removeElement(` + reqs_id + `)" class="removeButton"><ion-icon name="close-outline"></ion-icon></button>
            </div>
        </div>`;
            //append elements
            $("#reqs").append(input)

        }
    </script>
@endsection
