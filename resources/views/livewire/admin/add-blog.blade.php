<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-5">
        <button wire:click.prevent="create({{ Auth::id() }})"
           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
           Cập nhật
        </button>
    </div>

    @if(Session::has('message'))
        <div class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold
        text-xs text-white uppercase tracking-widest">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="mt-4">
        <x-jet-label for="title" value="{{ __('Tên bai viet') }}"/>
        <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model="title"
                      required wire:keyup="generatesSlug"  />
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="mt-4">
        <x-jet-label for="slug" value="{{ __('Đường dẫn') }}"/>
        <div class="mt-1 flex rounded-md shadow-sm">
                  <span
                      class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://luma.test/blogs/
                  </span>
            <input wire:model="slug" type="text"
                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                   placeholder="url-slug">
        </div>
        @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
    </div>
    <div class="mt-4">
        <x-jet-label for="title" value="{{ __('Danh mục bai viet') }}"/>
        <select wire:model="id_cate"
                class="form-select block w-full border-gray-300 focus:border-indigo-300  focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option>Chọn danh mục</option>
                @foreach(\App\Models\CategoryNew::all() as $cate)
                    <option value="{{ $cate->id }}" class="uppercase"> {{ $cate->name }}</option>
                @endforeach

        </select>
        @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="mt-4">
        <x-jet-label for="short" value="{{ __('Mieu ta ngan') }}"/>
        <x-jet-input id="short" class="block mt-1 w-full" type="text" wire:model="short_description"
                     required  />
        @error('short_description') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="mb-2" wire:ignore>
        <label class="block font-medium text-sm text-gray-700" for="page-text-editor">Noi dung</label>
        <textarea class="detail_description form-input rounded-md shadow-sm mt-1 block w-full " id="detail_description"
                  name="detail_description" rows="20"
                  wire:model.debounce.9999999ms="detail_description"
                  wire:key="detail_description"
                  x-data
                  x-ref="detail_description"
                  x-init="
                    tinymce.init({
                         path_absolute: '/',
                         selector: 'textarea.detail_description',
                         plugins: [
                              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                               'searchreplace wordcount visualblocks visualchars code fullscreen ',
                               'insertdatetime media nonbreaking save table directionality',
                               'emoticons template paste textpattern  imagetools help  '
                                ],
                                 toolbar: 'insertfile undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | help ',
                                 relative_urls: false,
                                 remove_script_host : false,
                                 document_base_url: '{{config('app.url')}}/',
                                 language: 'en',
                                 setup: function (editor) {
                                         editor.on('init change', function () {
                                                   editor.save();
                                           });
                                editor.on('change', function (e) {
                                         @this.set('detail_description', editor.getContent());
                                 });
                                  },
                                  });
                                 ">
        </textarea>
    </div>
</div>
{{--<script>--}}
{{--    tinymce.init({--}}
{{--        selector: 'textarea.detail_description',--}}

{{--        image_class_list: [--}}
{{--            {title: 'img-responsive', value: 'img-responsive'},--}}
{{--        ],--}}
{{--        height: 700,--}}
{{--        setup: function (editor) {--}}
{{--            editor.on('init change', function () {--}}
{{--                editor.save();--}}
{{--            });--}}
{{--        },--}}
{{--        plugins: [--}}
{{--            "advlist autolink lists link image charmap print preview anchor",--}}
{{--            "searchreplace visualblocks code fullscreen",--}}
{{--            "insertdatetime media table contextmenu paste imagetools"--}}
{{--        ],--}}
{{--        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",--}}

{{--        image_title: true,--}}
{{--        automatic_uploads: true,--}}
{{--        images_upload_url: '/upload',--}}
{{--        file_picker_types: 'image',--}}
{{--        file_picker_callback: function(cb, value, meta) {--}}
{{--            var input = document.createElement('input');--}}
{{--            input.setAttribute('type', 'file');--}}
{{--            input.setAttribute('accept', 'image/*');--}}
{{--            input.onchange = function() {--}}
{{--                var file = this.files[0];--}}

{{--                var reader = new FileReader();--}}
{{--                reader.readAsDataURL(file);--}}
{{--                reader.onload = function () {--}}
{{--                    var id = 'blobid' + (new Date()).getTime();--}}
{{--                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;--}}
{{--                    var base64 = reader.result.split(',')[1];--}}
{{--                    var blobInfo = blobCache.create(id, file, base64);--}}
{{--                    blobCache.add(blobInfo);--}}
{{--                    cb(blobInfo.blobUri(), { title: file.name });--}}
{{--                };--}}
{{--            };--}}
{{--            input.click();--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
