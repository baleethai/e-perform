@php use App\Enums\WorkStatus;use Carbon\Carbon; @endphp
<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>
<div class="container mx-auto book">
    <div class="page">
        <div class="subpage">
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div style="float: right;">
                    <img src="{{ asset('img/logo-mobile.png') }}" width="100"/>
                </div>
                <div>
                    <h1 class="text-3xl text-bold">แบบประเมินผลงานบุคลากร</h1>
                </div>
                <div>
                    ตำแหน่งปฏิบัติการวิชาชีพและบริหารทั่วไป
                </div>
                <div>
                    ครั้งที่ {{ thaiNumberDigit($portfolio->no) }}
                    ภาระงานระหว่างวันที่ {{ thaiNumberDigit(Carbon::parse($portfolio->started_at)->thaidate('d F Y')) }}
                    ถึงวันที่ {{ thaiNumberDigit(Carbon::parse($portfolio->ended_at)->thaidate('d F Y')) }}
                    ({{ thaiNumberDigit(Carbon::parse($portfolio->started_at)->diffInDays($portfolio->ended_at)) }} วัน)
                </div>
                <div class="text-left">
                    ชื่อ-ฉายา/นามสกุล <span
                        class="text-bold">{{ $portfolio->personnel->prefix->name }}{{ $portfolio->personnel->full_name }}</span>
                    ตำแหน่ง <span class="text-bold">{{ $portfolio->personnel->position->name }}</span>
                </div>
                <div class="text-left">
                    แผนก <span class="text-bold">{{ $portfolio->personnel->position->department->name }}</span>
                </div>
                {{--                    <div class="text-left">--}}
                {{--                        สังกัดส่วน <span class="text-bold">ส่วนเทคโนโลยีสารสนเทศ</span> สำนัก/คณะ <span class="text-bold">สำนักหอสมุดและเทคโนโลยีสารสนเทศ</span>--}}
                {{--                    </div>--}}
                <div class="text-left">
                    สถานะ {{ WorkStatus::getDescription($portfolio->personnel->work_status) }} วันที่เริ่มปฏิบัติงาน <span
                        class="text-bold">{{ thaiNumberDigit(Carbon::parse($portfolio->personnel->work_start_date)->thaidate('d F Y')) }}</span>
                    {{--                        วัน/เดือน/ปี ทดลองปฏิบัติงาน........หรือ วัน/เดือน/ปี  บรรจุ <span class="text-bold">๑๕ พฤษภาคม ๒๕๕๗</span>--}}
                </div>

                @include('reports.partials.section-1-portfolio')

                @include('reports.partials.section-2-portfolio')

                @include('reports.partials.section-3-portfolio')

            </div>

        </div>
    </div>
</div>
</body>
</html>
