<div class="my-4 dark:border-gray-700">
    <ul class="flex gap-2 -mb-px overflow-x-scroll text-sm font-medium text-center tab-judul sm:gap-8"
        id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
        data-tabs-active-classes="text-white border bg-purple-600 hover:text-purple-400 dark:text-purple-500 dark:hover:text-purple-500 border-slate-200 dark:border-purple-500"
        data-tabs-inactive-classes="border bg-slate-950 border-slate-200 text-gray-400 hover:text-purple-700 hover:border-slate-100 dark:text-gray-400 border-gray-100 dark:border-gray-700 dark:hover:text-gray-300"
        role="tablist">

        {{-- @foreach ($categories as $category)
            <li class="" role="presentation">
                <button
                    class="inline-block p-4 text-sm border-b-2 rounded-t-lg sm:text-xl border-slate-700 hover:text-purple-400 hover:border-purple-600 "
                    id="{{ $category->name }}-styled-tab" data-tabs-target="#styled-{{ $category->name }}"
                    type="button" role="tab" aria-controls="" aria-selected="false">{{ $category->name }}</button>
            </li>
        @endforeach --}}
        @foreach ($categories as $category)
            <li class="" role="presentation">
                <button
                    class="bg-purple-600 border border-slate-200 rounded-3xl inline-block px-8 py-2.5 text-sm  sm:text-md hover:text-white hover:bg-purple-700 hover:border hover:border-slate-100"
                    id="{{ $category->name }}-styled-tab" data-tabs-target="#styled-{{ $category->name }}"
                    type="button" role="tab" aria-controls="{{ $category->name }}"
                    aria-selected="false">{{ $category->name }}</button>
            </li>
        @endforeach




    </ul>
</div>
<div id="default-styled-tab-content" class="px-4">

    @foreach ($categories as $category)
        <div class="hidden pt-2 " id="styled-{{ $category->name }}" role="tabpanel"
            aria-labelledby="{{ $category->name }}-tab">
            <div class="grid grid-cols-2 gap-6 text-center  sm:grid-cols-3 lg:grid-cols-4 sm:p-4 sm:gap-3 lg:gap-10 ">
                @foreach ($data as $product)
                    @if ($product->category->name == $category->name)
                        <a href="{{ route('product-detail', $product->slug) }}" wire:navigate
                            class="relative flex flex-col items-center justify-center w-full p-1 mt-8 text-white border rounded-lg bg-gradient-to-bl from-gray-800 to-purple-950-800 h-36 sm:h-52 hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                            <img class="absolute  w-16 h-16 sm:w-24 md:w-28  sm:h-24 md:h-28  border shadow-md  object-fill  -top-8 sm:-top-12 rounded-md sm:rounded-3xl border-slate-600"
                                src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                            <span class="-mt-3 font-sans text-xs font-light sm:text-xl sm:font-normal dark:text-white ">
                                {{ ucwords(strtolower($product->name)) }}
                            </span>
                            <button type="button"
                                class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 text-xs px-2 font-light sm:py-2 py-1 text-center w-[70%]">
                                Top Up
                            </button>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

</div>
