<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Questions') }}
            </h2>
            <div id="add">
                <x-primary-button>{{ __('Create Your Question') }}</x-primary-button>
            </div>
        </div>
    </x-slot>

    <x-form-add></x-form-add>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($questions as $question)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <!-- Top Section: User Information and Question Image -->
                            <div class="flex items-center">
                                <img class="w-12 h-12 rounded-full object-cover" src="https://tse1.mm.bing.net/th/id/OET.7252da000e8341b2ba1fb61c275c1f30?w=594&h=594&c=7&rs=1&o=5&pid=1.9" alt="User Image">
                                <div class="ml-3">
                                    <h2 class="font-semibold text-lg">{{ $question->user->full_name }}</h2>
                                    <p class="text-gray-500 text-sm">Posted on {{ $question->user->created_at }}</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="h-8 w-8 rounded-full hover:bg-gray-200 flex justify-center items-center cursor-pointer hover:scale-110">
                                    <i class="fa-regular fa-bookmark"></i>
                                </span>
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <span class="h-8 w-8 rounded-full hover:bg-gray-200 flex justify-center items-center cursor-pointer hover:scale-110">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </span>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="px-1">
                                                <x-dropdown-link :href="route('question.edit',  ['id' => $question->id])">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>

                                                <form action="{{ route('question.delete',  ['id' => $question->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                            </div>
                        </div>
                        <!-- Question Content -->
                        <div class="mt-8">
                            <a href='{{ url("/question/$question->id/show") }}'>
                                <h3 class="text-xl font-bold text-gray-800 hover:text-gray-500">{{ $question->title }}</h3>
                            </a>
                            <p class="mt-2 text-gray-600">
                                {{ $question->content }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>

