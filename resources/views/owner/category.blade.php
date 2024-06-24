<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>ff</p>
                    <div class="p-6 text-gray-900">
                        @if ($categories->isEmpty())
                            <p>No categories found.</p>
                        @else
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('owner.category.show', ['categoryname' => $category->name] ) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @if ($errors->any())
                        <div class="mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('owner.category.store')}}">
                        @csrf
                        <input type="text" name="category" value="{{ old('category')}}">
                        <button>追加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
