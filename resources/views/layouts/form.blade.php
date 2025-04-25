
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-6">Ask Legal Question</h2>
                @if (isset($inputText))
                    <p><strong>Your Input:</strong></p>
                    <p>{{ $inputText }}</p>
                @endif

                @if (isset($generatedText))
                    <p><strong>Gemini's Response:</strong></p>
                    <p>{!! $generatedText !!}</p>
                @endif
                <form method="POST" action="{{ route('form-submit') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="query" class="block text-gray-700 text-sm font-bold mb-2">Your Legal Question:</label>
                        <textarea id="query" name="query" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your legal question here...">{{ old('query') }}</textarea>
                        @error('query')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit Query
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
