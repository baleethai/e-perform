<!-- Start Hero -->
<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">

                    @include('components.alert')

                    <h5 class="text-lg font-semibold mb-4">เพิ่มงานวิชาการ</h5>

                    <form wire:submit.prevent="submit">
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">

                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">ประเภทงานวิจัย <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select wire:model="academic_type_id" class="form-input">
                                        @foreach($academicTypes as $academicType)
                                            <option value="{{ $academicType->id }}">{{  $academicType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_type_id') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">ชื่องานวิชาการ <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" class="form-input" wire:model="name" placeholder="ชื่องานวิชาการ">
                                    @error('name') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">รายละเอียด <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <textarea class="form-input" wire:model="description" rows="5" placeholder="รายละเอียด"></textarea>
                                    @error('description') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="lg:col-span-1">
                                <label class="form-label font-medium">ผู้เขียน/ผู้แต่ง <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="author" class="form-input" placeholder="ผู้เขียน/ผู้แต่ง" required>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <label class="form-label font-medium">เผยแพร่ <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select wire:model="is_visible" class="form-input" required>
                                        <option value="0">ไม่เผยแพร่</option>
                                        <option value="1">เผยแพร่</option>
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <label class="form-label font-medium">ภาพปก <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="file" wire:model="documents" class="form-input">
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">อัปเดตข้อมูล</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Hero -->
