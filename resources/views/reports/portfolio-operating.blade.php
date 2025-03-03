@php use App\Enums\WorkStatus;use Carbon\Carbon; @endphp
<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>
<div class="container mx-auto book">
    <div class="page">
        <div class="subpage">
            <div class="text-center gap-1 mt-5 text-xl ml-10">
                <img src="{{ asset('img/logo-mobile.png') }}" width="100" style="display: inline;"/>
            </div>
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div>
                    <h1 class="text-3xl text-bold">แบบประมวลผลงานบุคลากร</h1>
                </div>
                <div>
                    ตำแหน่งปฏิบัติการวิชาชีพและบริหารทั่วไป
                </div>
                <div class="font-bold">
                    ครั้งที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit($portfolioOperating->no) }}</span>
                    ภาระงานระหว่างวันที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioOperating->started_at)->thaidate('d F Y')) }}</span>
                    ถึงวันที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioOperating->ended_at)->thaidate('d F Y')) }}</span>
                    ({{ thaiNumberDigit(Carbon::parse($portfolioOperating->started_at)->diffInDays($portfolioOperating->ended_at)) }} วัน)
                </div>
                <div class="text-left">
                    ชื่อ-ฉายา/นามสกุล <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->personnel->prefix->name }}{{ $portfolioOperating->personnel->full_name }}</span>
                    ตำแหน่ง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->personnel->position->name }}</span>
                    แผนก <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->personnel->position->department->name }}</span>
                </div>
                <div class="text-left">
                    สังกัดส่วน <span class="underline underline-offset-4 decoration-2 decoration-dotted">ส่วนเทคโนโลยีสารสนเทศ</span> สำนัก/คณะ <span class="underline decoration-dotted">สำนักหอสมุดและเทคโนโลยีสารสนเทศ</span>
                </div>
                <div class="text-left">
                    สถานะ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ WorkStatus::getDescription($portfolioOperating->personnel->work_status) }}</span>
                    วันที่เริ่มปฏิบัติงาน <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioOperating->personnel->work_start_date)->thaidate('d F Y')) }}</span>
                </div>

                <div class="text-left mt-2 font-bold">
                    ๑. หน้าที่ความรับผิดชอบหลักเป็นงานประจำในช่วงระยะเวลาของการประเมินผลการปฏิบัติงาน : โปรดเรียงลำดับตามความสำคัญถึงภารกิจที่บุคลากรรับผิดชอบในช่วงการประเมิน
                </div>

                <div class="text-left mt-2">
                    <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioOperating->main_responsibilities !!}</span>
                </div>

                <div class="text-left mt-2 font-bold">
                    ๒. ผลสำเร็จของงานหรือความก้าวหน้าของงานตามข้อ , ในช่วงระยะเวลาของการประเมิน : โปรดระบุผลสำเร็จของงานที่สำคัญหรือผลงานที่เกี่ยวข้องกับหน้าที่ความรับผิดชอบหลัก ตามที่ระบุในข้อ ๑ ในช่วงการประเมิน
                </div>

                <div class="text-left mt-2">
                    <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioOperating->main_responsibility_result  !!} </span>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="subpage">
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    ๓. นอกเหนือจากงานประจำที่ระบุไว้ในข้อ ๑ โปรดกรอกภาระงานที่ได้รับมอบหมายพิเศษ ตามข้อต่อไปนี้ <br>
                    <div class="ml-5">๓.๑ งานบริการแก่หน่วยงานอื่น เช่น รับเชิญเป็นพิธีกร วิทยากรหรืออื่น ๆ (ระบุชื่อหน่วยงานที่ไปช่วยปฏิบัติหน้าที่ที่ได้รับมอบหมาย)</div>
                </div>

                <div class="text-left mt-2">
                    <span class="underline underline-offset-4 decoration-2 decoration-dotted ml-5">{!! $portfolioOperating->main_responsibility_other  !!} </span>
                </div>

                <div class="text-left mt-2">
                    <div class="ml-5 font-bold">๓.๒ คณะกรรมการ / คณะทำงาน</div>
                    <div class="ml-10">
                        ๑. ชื่อคณะกรรมการ / คณะทำงาน <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_group_1 }}</span>
                    </div>
                    <div class="ml-5">
                        ตำแหน่ง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_position_1 }}</span>
                        วาระตั้งแต่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_start_1 }}</span>
                    </div>
                    <div class="ml-5">
                        จำนวนครั้งที่เข้าประชุม <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_number_of_meeting_1 }}</span>
                    </div>

                    <div class="ml-10">
                        ๒. ชื่อคณะกรรมการ / คณะทำงาน <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_group_2 }}</span>
                    </div>
                    <div class="ml-5">
                        ตำแหน่ง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_position_2 }}</span>
                        วาระตั้งแต่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_start_2 }}</span>
                    </div>
                    <div class="ml-5">
                        จำนวนครั้งที่เข้าประชุม <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_number_of_meeting_2 }}</span>
                    </div>

                    <div class="ml-10">
                        ๓. ชื่อคณะกรรมการ / คณะทำงาน <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_group_3 }}</span>
                    </div>
                    <div class="ml-5">
                        ตำแหน่ง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_position_3 }}</span>
                        วาระตั้งแต่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_working_start_3 }}</span>
                    </div>
                    <div class="ml-5">
                        จำนวนครั้งที่เข้าประชุม <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioOperating->board_number_of_meeting_3 }}</span>
                    </div>


                </div>

                <div class="text-left mt-2">
                    <div class="ml-5 font-bold">๓.๓ งานอื่นและงานที่ได้รับมอบหมายพิเศษ เช่น กรรมการคุมสอบ การไปร่วมงานกับคณะวิจัย เป็นต้น</div>
                    <div class="ml-10">
                        {!! $portfolioOperating->other_tasks_and_assignments  !!}
                    </div>
                </div>

                <div class="text-left mt-2">
                    <div class="ml-5 font-bold">๓.๔ ผลงานดีเด่นและรางวัลเกียรติคุณที่ได้รับ (ระบุชื่อรางวัล / ผลงาน / แหล่งที่มอบ)</div>
                    <div class="ml-10">
                        {!! $portfolioOperating->outstanding_achievements_and_awards  !!}่้
                    </div>่้
                </div>
{{--                @if ($portfolioOperating->documents)--}}
{{--                <div class="text-left mt-2">--}}
{{--                    <div class="ml-5 font-bold">เอกสารที่อัปโหลด</div>--}}
{{--                    <div class="ml-5">--}}
{{--                        <a href="{{ asset($portfolioOperating->documents) }}" target="_blank">{{ $portfolioOperating->documents }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endif--}}

            </div>
        </div>
    </div>

    <div class="page">
        <div class="subpage">
            <div class="text-left mt-2">
                @include('reports.partials.footer-signature-position')
            </div>
        </div>
    </div>
</div>
</body>
</html>
