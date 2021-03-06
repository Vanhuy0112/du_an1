<div class="">
    <div>
        <img src="//theme.hstatic.net/1000306701/1000692581/14/banner_image_collection.jpg?v=155" alt="">
    </div>
    <div class="flex my-6">
        <div class="w-1/4">
            <h2 class="font-bold text-xl uppercase my-3">Danh mục</h2>
            <ul class="text-md text-gray-500 uppercase">
                @foreach($categories as $cate)
                    <li class="my-4 hover:text-yellow-300 ">
                        <a href="#">{{ $cate->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-3/4">
            <div class="flex justify-between bg-gray-100 px-4 content-center items-center">
                <h3 class="font-bold">Danh muc</h3>
                <div class="py-2">
                    <select name=""
                            class="form-select text-sm block border-gray-300 focus:border-indigo-300  focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">tang dan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8">
                @foreach($products as $pro)
                    <div class="p-4 group">
                        <div class="overflow-hidden hover:translate-x-2">
                            <a href="{{ route('product.detail', ['slug' => $pro->slug]) }}"><img
                                    class="transform hover:scale-125 duration-700 "
                                    src="{{ asset('storage/' . $pro->feature_img) }}" alt=""></a>
                        </div>
                        <a href="{{ route('product.detail', ['slug' => $pro->slug]) }}"
                           class="hover:text-yellow-300 transform duration-700">{{ $pro->name }}</a>
                        <div class="my-2">
                            @if($pro->sale_price > 0)
                                <span
                                    class="text-lg font-bold">{{ number_format($pro->sale_price, '0', '.', '.') }}d</span>
                                <span
                                    class="line-through">{{ number_format($pro->regular_price, '0', '.', '.') }}d</span>
                            @else
                                <span class="text-lg font-bold">{{  number_format($pro->regular_price, '0', '.', '.') }}d</span>
                            @endif
                        </div>
                        <div
                            class="w-full py-2 border-black bg-gray-200 text-center transform hover:bg-yellow-300 duration-700">
                            <a href="#"
                               wire:click.prevent="store({{ $pro->id}}, '{{ $pro->name }}' , {{ $pro->regular_price }}, '{{ $pro->feature_img }}' )">Mua
                                Ngay</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
