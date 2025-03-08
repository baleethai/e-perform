<section class="md:h-screen py-36 flex items-center  bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">

                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('img/logo.png') }}" class="mx-auto" alt="">
                </a>

                <h5 class="my-6 text-xl text-center font-semibold">เข้าสู่ระบบ</h5>

                <form class="text-left" wire:submit.prevent="submit">

                    @include('components.alert')

                    <div class="grid grid-cols-1">
                        <div class="mb-4">
                            <label class="font-semibold" for="LoginEmail">อีเมล:</label>
                            <input wire:model="email" id="LoginEmail" type="email" class="form-input mt-3" placeholder="อีเมล" required>
                            @error('email') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="LoginPassword">รหัสผ่าน:</label>
                            <input wire:model="password" id="LoginPassword" type="password" class="form-input mt-3" placeholder="รหัสผ่าน:" required>
                            @error('password') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex justify-between mb-4">
                            <div class="form-checkbox flex items-center mb-0">
                                <input wire:model="rememberMe" class="mr-2 border border-inherit w-[14px] h-[14px]" type="checkbox" value="" id="RememberMe">
                                <label class="text-slate-400" for="RememberMe">จำชื่อเข้าระบบไว้</label>
                            </div>
                            <p class="text-slate-400 mb-0"><a href="" class="text-slate-400">ลืมรหัสผ่าน ?</a></p>
                        </div>

                        <div class="mb-4">
                            <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full cursor-pointer" value="เข้าสู่ระบบ">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
