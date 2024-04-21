<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900">
        <!-- Hero section -->
        <div class="py-20 sm:py-32 lg:py-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-orange-500 dark:text-green-500 leading-tight mb-4">
                        Welcome to FestiTrade.
                    </h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                        Your ultimate destination for trading festival gear!
                    </p>
                    <a href="{{ route('user.home') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                        Get Started
                    </a>
                </div>
            </div>
        </div>

        <!-- Purpose section -->
        <div class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-500 dark:text-gray-100 leading-tight mb-8">
                        Our Goals and Purpose
                    </h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                        At FestiTrade, we aim to create a platform that connects festival enthusiasts and provides them with a seamless experience to trade festival gear. Our goals include:
                    </p>
                    <ul class="text-lg text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Facilitate easy trading of festival gear items.</li>
                        <li>Build a vibrant community of festival-goers.</li>
                        <li>Provide a user-friendly platform for buying, selling, and trading.</li>
                        <li>Promote sustainability by encouraging reuse of festival gear.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Features section -->
        <div class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mt-4 mb-2">Discover Festival Gear</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center">Explore a wide range of festival gear items, from tents to accessories.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V3L4 14h5v7l5-11H4l5-11v7h5l-5 11v-7z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mt-4 mb-2">Trade with Ease</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center">Effortlessly buy, sell, or trade festival gear items with other users.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mt-4 mb-2">Connect with Others</h3>
                        <p class="text-gray-700 dark:text-gray-300 text-center">Join a vibrant community of festival-goers and enthusiasts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 bg-gray-200 dark:bg-gray-800">
        <div class="text-gray-600 dark:text-gray-400">
            <p>Email: contact@festitrade.com</p>
            <p>Phone: +1 (123) 456-7890</p>
            <p>Follow us on <a href="https://facebook.com/festitrade" target="_blank" class="underline">Facebook</a>, <a href="https://twitter.com/festitrade" target="_blank" class="underline">Twitter</a>, and <a href="https://instagram.com/festitrade" target="_blank" class="underline">Instagram</a></p>
        </div>
    </footer>
</x-app-layout>
