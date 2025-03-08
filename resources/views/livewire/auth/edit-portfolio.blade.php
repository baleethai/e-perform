<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">

                    <x-alert />

                    <h5 class="text-lg font-semibold mb-4">แก้ไขภาระงาน</h5>
                    <form wire:submit.prevent="submit">
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">หัวข้อภาระงาน<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" wire:model="name"  class="form-input" placeholder="หัวข้อภาระงาน" required>
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">เริ่มปฏิบัติงาน</label>
                                <div class="form-icon relative mt-2">
                                    <x-feathericon-calendar class="h4 w-4 absolute top-2 left-4" />
                                    <input type="text" wire:model="started_at" class="form-input pl-12 datepicker" placeholder="เริ่มปฏิบัติงาน">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">สิ้นสุดปฏิบัติงาน</label>
                                <div class="form-icon relative mt-2">
                                    <x-feathericon-calendar class="h4 w-4 absolute top-2 left-4" />
                                    <input type="text" wire:model="ended_at" class="form-input pl-12 datepicker" placeholder="สิ้นสุดปฏิบัติงาน">
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">รายละเอียด</label>
                                <div class="form-icon relative mt-2">
                                    <textarea wire:model="description" class="form-input h-28" placeholder="รายละเอียด"></textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-lg mt-2 font-semibold mb-4">รายละเอียดภาระงาน</h5>

                        @forelse($this->items as $index => $item)
                        <div class="grid lg:grid-cols-3 gap-5 border rounded-md p-3 mb-3">
                            <div class="lg:col-span-1">
                                <span ></span>{{ $loop->iteration  }}.
                            </div>
                            <div class="lg:col-span-2">
                                <x-feathericon-trash-2 class="h1 w-1 cursor-pointer right" style="float: right;" wire:click.prevent="removeItem({{ $item['id'] }})" />
                            </div>
                            <div>
                                <label class="form-label font-medium">ประเภทภาระงาน</label>
                                <div class="mt-2">
                                    <select class="form-input" wire:model="items.{{ $loop->index}}.type }} }}" required>
                                        @foreach($this->portfolioTypes as $portfolioType)
                                        <option value="{{ $portfolioType->id }}" @selected($portfolioType->id)>{{ $portfolioType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">รายละเอียด</label>
                                <div class="form-icon relative mt-2">
                                    <textarea wire:model="items.{{ $index }}.name" class="form-input h-28" placeholder="รายละเอียด" required></textarea>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <label class="form-label font-medium">เรียงลำดับ</label>
                                <div class="mt-2">
                                    <input wire:model="items.{{ $index }}.sort"  type="text" class="form-input" />
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label class="form-label font-medium">รายงานผล</label>
                                <div class="mt-2">
                                    <textarea wire:model="items.{{ $index }}.result" class="form-input h-28" placeholder="รายละเอียด" required></textarea>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="mb-3 text-center">
                                <div>ไม่มีข้อมูล</div>
                            </div>
                        @endforelse
                        <div class="grid lg:grid-cols-1 gap-5 p-3 mb-3 lg:items-center">
                            <x-feathericon-plus-circle class="h1 w-1 cursor-pointer lg:items-center" wire:click.prevent="addItem" />
                        </div>

                        <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5 cursor-pointer" value="แก้ไขข้อมูล">

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
flatpickr(".datepicker", {

});
</script>
@endpush
