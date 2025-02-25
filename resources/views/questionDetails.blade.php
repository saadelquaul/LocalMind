<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Questions') }}
            </h2>
            <div id="add">
                <x-primary-button>{{ __('Create Your Question') }}</x-primary-button>
            </div>
        </div>
    </x-slot>

    <x-form-add></x-form-add>

    <div class="w-full comment fixed bottom-0">
        <div class="p-4 bg-gray-800 md:w-4/5 mx-auto rounded-tr-lg rounded-tl-lg h-36">
            <form action="{{ route('answer.store') }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <x-textarea id="content" name="content" rows="2" class="mt-1 block w-full" :value="old('content', )" required autofocus autocomplete="content" />
                <div class="mt-2 float-end">
                    <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Top Section: User Information and Question Image -->
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full object-cover" src="https://tse1.mm.bing.net/th/id/OET.7252da000e8341b2ba1fb61c275c1f30?w=594&h=594&c=7&rs=1&o=5&pid=1.9" alt="User Image">
                        <div class="ml-3">
                            <h2 class="font-semibold text-lg">{{ $question->user->full_name }}</h2>
                            <p class="text-gray-500 text-sm">Posted on {{ $question->user->created_at }}</p>
                        </div>
                    </div>
                    <!-- Question Content -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">{{ $question->title }}</h3>
                        <p class="mt-2 text-gray-600">
                            {{ $question->content }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Answers Section -->
                <div class="border-gray-200">
                    <div class="mb-6 flex items-center justify-between">
                        <h4 class="font-semibold text-lg text-gray-800">Answers:</h4>
                        <div id="add-comment">
                            <x-primary-button>{{ __('Add Your Answer') }}</x-primary-button>
                        </div>
                    </div>

                    <!-- Answer -->
                    @foreach ($answers as $answer)
                        <div class="flex items-start py-4 border-b border-gray-200">
                            <img class="w-10 h-10 rounded-full object-cover" src="https://tse1.mm.bing.net/th/id/OET.1cd3a14243ad460ba913bb60cff76789?w=288&h=288&c=7&rs=1&o=5&pid=1.9" alt="Answerer Image">
                            <div class="ml-3">
                                <h5 class="font-semibold text-lg">{{ $answer->user->full_name }}</h5>
                                <p class="mt-2 text-gray-600">
                                    {{ $answer->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
