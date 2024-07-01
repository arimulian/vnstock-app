<div class="h-full overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        {{--create--}}
        <div class="flex justify-between">
            <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                List of products✨
            </h2>
            <!-- Button create -->
            <a wire:navigate
               class="flex items-center justify-between p-2 mt-6 mb-8 text-sm font-semibold text-purple-100
                bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
               href="{{route('product.create')}}"
            >
                <div class="flex items-center">
                    <span>Create a new product</span>
                    <svg class="mx-2 w-3 h-3" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                         viewBox="0 0
                 24 24"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </div>
            </a>
        </div>
        <!-- With actions -->
        @if(session('status'))
            <div class="bg-green-100 mb-5  border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">{{ session('status')}}</p>
            </div>
        @endif
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b
                dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-700">
                        <th class="px-4 py-3 font-bold">#</th>
                        <th class="px-4 py-3 font-bold">Name</th>
                        <th class="px-4 py-3 font-bold">Size</th>
                        <th class="px-4 py-3 font-bold">Price</th>
                        <th class="px-4 py-3 font-bold">category</th>
                        <th class="px-4 py-3 font-bold">image</th>
                        <th class="px-4 py-3 font-bold">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($products as $i => $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$products->firstItem() + $i}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$product->name}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$product->size}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{Number::currency($product->price, 'IDR', 'id')}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$product->categories->name}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if($product->image)
                                    {{--bug[directive path]--}}
                                    <img src="{{Vite::asset('public/storage/'.$product->image)}}" width="80"
                                         height="80" alt="product">
                                @else
                                    None
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm flex">
                                {{--update--}}
                                <a wire:navigate class="p-1" href="{{ route('product.update', $product->slug) }}">
                                    <svg class="h-7 w-7 stroke-1 stroke-purple-600 hover:fill-purple-500
                                hover:stroke-purple-200"
                                         data-slot="icon"
                                         fill="none"
                                         stroke-width="1.5"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                    </svg>
                                </a>
                                {{--delete--}}
                                <button class="p-1" wire:confirm="Are You Sure?" wire:click="destroy
                                ({{$product->id}})">
                                    <svg class="h-7 w-7 stroke-1 stroke-red-600 hover:fill-red-600 hover:stroke-red-200"
                                         data-slot="icon"
                                         fill="none"
                                         stroke-width="1.5"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
                            <span class="flex items-center col-span-3">
                              Showing {{$products->firstItem()}}-{{$products->lastItem()}} of {{ $total}}
                            </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <div class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>