<!-- Start Hero -->
<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <h5 class="text-lg font-semibold mb-4">ข้อมูลส่วนตัว</h5>

                    <form wire:submit.prevent="submit">
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label class="form-label font-medium">ตำแหน่ง<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select wire:model="position_id" class="form-input bg-gray-100" required disabled>
                                        <option value="">เลือกตำแหน่ง</option>
                                        @foreach($this->positions as $prefix)
                                            <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">รหัสบุคคลากร<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="code" class="form-input bg-gray-100" placeholder="รหัสบุคคลากร:" required disabled>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">คำนำหน้า : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select wire:model="prefix_id" class="form-input" required>
                                        <option value="">เลือกคำนำหน้า</option>
                                        @foreach($this->prefixes as $prefix)
                                            <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">ชื่อ : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="first_name" class="form-input" placeholder="ชื่อ" required>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">นามสกุล : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="last_name" class="form-input" placeholder="นามสกุล" required>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">เลขที่บัตประชาชน : </label>
                                <div class="form-icon relative mt-2">
                                    <input wire:model="id_card" type="text" class="form-input bg-gray-100" placeholder="เลขที่บัตประชาชน :" disabled>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">วันที่เริ่มงาน : </label>
                                <div class="form-icon relative mt-2">
                                    <input wire:model="work_start_date" type="date" class="form-input bg-gray-100" placeholder="วันที่เริ่มงาน :" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <div class="mt-5">
                                <label class="form-label font-medium">ประวัติส่วนตัว : </label>
                                <div class="form-icon relative mt-2">
                                    <textarea wire:model="bio" id="comments" class="form-input h-28" placeholder="ประวัติส่วนตัว :"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">อัปเดตข้อมูล</button>
                    </form>
                </div>

                <div class="p-6 mt-5 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <h5 class="text-lg font-semibold mb-4">ข้อมูลเข้าสู่ระบบ :</h5>
                    <div class="grid lg:grid-cols-2 grid-cols-2 gap-5">

                        <div>
                            <label class="form-label font-medium">อีเมล : <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <input type="email" wire:model="email" class="form-input bg-gray-100" placeholder="อีเมล" required disabled>
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">รหัสผ่าน : <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <input type="password" wire:model="password" class="form-input" placeholder="รหัสผ่าน" required>
                            </div>
                        </div>
                        <div>
                            <button class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">อัปเดตข้อมูล</button>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Hero -->
