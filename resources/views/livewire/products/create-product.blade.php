<div class="h-full overflow-y-auto">
    <div class="container px-6 grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create a new product✨
        </h2>
        <form wire:submit="save" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label for="name" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Name
            </label>
            <input wire:model="form.name" id="name" type="text" class="my-1 block w-full p-2 rounded-md bg-gray-100
            text-sm
            dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none
            focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            @error('form.name')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <label class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Category
            </label>
            <select wire:model.live="form.category_id"
                    class="my-1 block w-full p-2 rounded-md bg-gray-100 text-sm dark:border-gray-600
                        dark:bg-gray-700 focus:border-purple-400 focus:outline-none
                        focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            >
                <option value="" selected disabled>Select a Category...</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('form.category_id')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <label for="size" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Size
            </label>
            <input wire:model="form.size" id="size" type="text" class="my-1 block w-full p-2 rounded-md bg-gray-100
            text-sm
            dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none
            focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            @error('form.size')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <label for="price" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Price
            </label>
            <input wire:model="form.price" id="price" type="number" class="my-1 block w-full p-2 rounded-md
            bg-gray-100
            text-sm
            dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none
            focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            @error('form.price')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <label for="description" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Description
            </label>
            <textarea wire:model="form.description" id="description" type="text" class="my-1 block w-full p-3 rounded-md
            bg-gray-100 text-sm
            dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none
            focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"></textarea>
            @error('form.description')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <label for="image" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Image
            </label>
            <input wire:model="form.image" id="image" type="file" class="my-1 block w-full p-2 rounded-md bg-gray-100 text-sm
            dark:border-gray-600
            dark:bg-gray-700 focus:border-purple-400 focus:outline-none
            focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            @error('form.image')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <button type="submit" class=" p-2 mt-6 mb-8 text-sm font-semibold text-purple-100
                bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
            <a wire:navigate href="{{ route('product.list')}}" class="p-2 mt-6 mb-8 text-sm
                font-semibold
                text-purple-100
                bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                Back
            </a>
        </form>
    </div>
</div>

