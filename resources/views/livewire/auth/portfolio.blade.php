<!-- Start Hero -->
<section class="relative lg:pb-24 pb-16">

    @include('livewire.auth.partials.pro-banner')

    <div class="container lg:mt-24 mt-16">
        <div class="md:flex">

            @include('livewire.auth.partials.navbar-menu')

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">

                <div class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 mt-6">

                    <div class="px-6">
                        <ul>
                            @forelse($portfolios as $portfolio)
                            <li class="flex justify-between items-center py-4">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="font-semibold">
                                            <a href="{{ route('auth.portfolio.edit', $portfolio) }}">
                                                {{ $loop->iteration }}. {{ $portfolio->name }}
                                            </a>
                                        </p>
                                        <p class="text-slate-400 text-sm">
                                            ระหว่างวันที่ {{ $portfolio->started_at->format('d/m/Y') }} - {{ $portfolio->ended_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('auth.portfolio.edit', $portfolio) }}" class="btn btn-icon rounded-full">
                                        <x-feathericon-edit class="h-4 w-4 cursor-pointer" />
                                    </a>
                                    <button type="button" wire:click="delete({{ $portfolio->id }})" class="btn btn-icon rounded-full">
                                        <x-feathericon-trash class="h-4 w-4 cursor-pointer" />
                                    </button>
                                </div>
                            </li>
                            @empty
                                <li class="flex justify-between items-center py-6">ไม่มีรายการ</li>
                            @endforelse

                            <li class="py-6 border-t border-gray-100 dark:border-gray-700">
                                <a href="{{ route('auth.portfolio.create') }}" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">เพิ่มภาระงาน</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
