<div>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create a new category✨
        </h2>

        <form wire:submit="save" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label for="name" class="block text-sm p-3 text-gray-700 dark:text-gray-400">
                Name
            </label>
            <input wire:model="name" id="name" type="text" class="block w-full p-2 rounded-md
            bg-gray-100
                text-sm
                dark:border-gray-600
                dark:bg-gray-700
                focus:border-purple-400
                 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            @error('name')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <button type="submit" class=" p-2 mt-6 mb-8 text-sm font-semibold text-purple-100
                bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
            <a href="{{ url('/categories')}}" class="p-2 mt-6 mb-8 text-sm
                font-semibold
                text-purple-100
                bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                Back
            </a>
        </form>
    </div>
</div>
