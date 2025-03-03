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
                            <div class="lg:col-span-1">

                                <x-native-select
                                    label="ประเภทเอกสาร"
                                    placeholder="เลือกเลือกประเภทเอกสาร"
                                    :options="$documentTypes"
                                    option-key-value=true
                                    wire:model="document_type_id"
                                />

                            </div>
                            <div class="lg:col-span-2">
                                <x-input wire:model="name" label="ชื่อเอกสาร" placeholder="ชื่อเอกสาร" />
                            </div>
                            <div class="lg:col-span-2">

                                <textarea name="description" id="" cols="30" rows="10"></textarea>

                            </div>
                            <div class="lg:col-span-1">
                                <label class="form-label font-medium">เอกสาร <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="file" name="files" class="form-input">
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
