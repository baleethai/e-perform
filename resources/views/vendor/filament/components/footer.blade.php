@if (config('filament.layout.footer.should_show_logo'))
    <div class="flex items-center justify-center filament-footer">
        <a
            href="{{ url()->current() }}"
            rel="noopener noreferrer"
            class="text-center text-gray-300 hover:text-primary-500 transition"
        >
            {{ env('APP_NAME') }}
{{--            <span>--}}
{{--                {{ \Composer\InstalledVersions::getPrettyVersion('filament/filament') }}--}}
{{--            </span>--}}
        </a>
    </div>
@endif
