<div>
    <div class="p-4">
        <div class="relative p-4 mb-2 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 max-w-lg mx-auto">
            <!-- Modal header -->
            <div class="flex justify-between items-center rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mx-auto">
                    Selamat Datang di
                </h3>
            </div>
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="font-semibold text-gray-900 dark:text-white mx-auto">
                    <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">JoyFinory</span>
                </h3>
            </div>
            <!-- Modal body -->
            <form wire:submit.prevent="login" action="#" method="POST">
                <div class="gap-4 overflow-y-auto max-h-[680px] max-w-sm mx-auto relative z-10">
                    <div class="mb-4">
                        <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengguna</label>
                        <input wire:model="username" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        <div>
                            @error('username') <span class="text-red-700">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block py-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                        <input wire:model="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        <div>
                            @error('password') <span class="text-red-700">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
