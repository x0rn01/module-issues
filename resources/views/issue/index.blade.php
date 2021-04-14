<x-app-layout>
    <div class="ideas-container space-y-6 my-6">
        @foreach($issues as $issue)
            <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
                <div class="border-r border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="div text-gray-500">Votes</div>
                    </div>
                    <div class="mt-8">
                        <button class="w-20 bg-gray-100 hover:bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3
                        border-gray-200 transition duration-150 easi-in">Vote</button>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                    <div class="flex-none">
                        <a href="">
                            <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">{{ $issue['title'] }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $issue['body'] }}
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div>12 hours ago</div>
                                <div>&bull;</div>
                                <div>John Doe</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="bg-blue-300 text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    Open
                                </div>
                                <button class="bg-gray-100 relative hover:bg-gray-200 rounded-full h-7 transition duration-150 easi-in py-2 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul class="absolute w-44 font-semibold bg-white text-left ml-8 shadow-lg rounded-xl py-3 hidden">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 easi-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 easi-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end idea container -->
        @endforeach
    </div> <!-- end ideas container -->
</x-app-layout>
