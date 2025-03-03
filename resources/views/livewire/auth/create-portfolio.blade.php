<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">

                    <h5 class="text-lg font-semibold mb-4">เพิ่มภาระงาน</h5>

                    <x-alert />

                    <form wire:submit.prevent="submit">
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">หัวข้อภาระงาน<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="name"  class="form-input" placeholder="หัวข้อภาระงาน" required>
                                    @error('name') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">เริ่มปฏิบัติงาน</label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="started_at" class="form-input datepicker" placeholder="เริ่มปฏิบัติงาน">
                                    @error('started_at') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">สิ้นสุดปฏิบัติงาน</label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="ended_at" class="form-input datepicker" placeholder="สิ้นสุดปฏิบัติงาน">
                                    @error('ended_at') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">รายละเอียด</label>
                                <div class="form-icon relative mt-2">
                                    <textarea wire:model="description" class="form-input h-28" placeholder="รายละเอียด"></textarea>
                                    @error('description') <span class="text-red-600 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

{{--                        <h5 class="text-lg mt-2 font-semibold mb-4">รายละเอียดภาระงาน</h5>--}}

{{--                        <div class="grid lg:grid-cols-3 gap-5 border rounded-md p-3 mb-3" id="item-lists">--}}
{{--                            <div class="lg:col-span-3">--}}
{{--                                <x-feathericon-plus-circle class="h1 w-1 cursor-pointer" />--}}
{{--                            </div>--}}
{{--                            <div class="lg:col-span-1">--}}
{{--                                <label class="form-label font-medium">ประเภทภาระงาน</label>--}}
{{--                                <div class="form-icon relative mt-2">--}}
{{--                                    <select class="form-input">--}}
{{--                                        <option value="1">ภาระงานหลัก</option>--}}
{{--                                        <option value="2">ภาระงานรอง</option>--}}
{{--                                        <option value="3">ภาระงานมอบหมาย</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="lg:col-span-2">--}}
{{--                                <label class="form-label font-medium">--}}
{{--                                    รายละเอียด--}}
{{--                                </label>--}}
{{--                                <div class="form-icon relative mt-2">--}}
{{--                                    <x-feathericon-file class="h4 w-4 absolute top-2 left-4" />--}}
{{--                                    <textarea class="form-input pl-11 h-28" placeholder="รายละเอียด"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5 cursor-pointer" value="เพิ่มข้อมูล">

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
flatpickr(".datepicker", {});
</script>
@endpush
