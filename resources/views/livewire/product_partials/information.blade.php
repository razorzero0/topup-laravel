<li class="text-sm leading-6 sm:mt-5  @if ($style) {{ 'hidden sm:block' }}
 @else
   {{ 'block sm:hidden' }} @endif"
    id="box-information">
    <div class="relative group">
        <div
            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
        </div>
        <div class="relative p-6 space-y-6 leading-none rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
            <div class="flex items-center space-x-4">
                <img src="{{ asset($image ?? '') }}" class="w-16 h-16 -skew-x-6 bg-center bg-cover border rounded-md"
                    alt="logo">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $name ?? '' }}</h3>
                    <p class="text-gray-500 text-md">{{ $company ?? '' }}</p>
                </div>
            </div>
            <div class="leading-normal text-slate-300 ps-2 text-md information">

                {!! $description ?? '' !!}
            </div>
        </div>

    </div>
</li>
