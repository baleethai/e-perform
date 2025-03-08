@php use App\Enums\WorkStatus;use Carbon\Carbon; @endphp
<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personnel->full_name }}</title>
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
                    ตำแหน่งวิชาการ
                </div>
                <div class="font-bold">
                    ครั้งที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit($portfolioAcademic->no) }}</span>
                    ภาระงานระหว่างวันที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioAcademic->started_at)->thaidate('d F Y')) }}</span>
                    ถึงวันที่ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioAcademic->ended_at)->thaidate('d F Y')) }}</span>
                    ({{ thaiNumberDigit(Carbon::parse($portfolioAcademic->started_at)->diffInDays($portfolioAcademic->ended_at)) }} วัน)
                </div>
                <div class="text-left">
                    ชื่อ-ฉายา/นามสกุล <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioAcademic->personnel->prefix->name }}{{ $portfolioAcademic->personnel->full_name }}</span>
                    ตำแหน่ง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioAcademic->personnel->position->name }}</span>
                    แผนก <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ $portfolioAcademic->personnel->position->department->name }}</span>
                </div>
                <div class="text-left">
                    สังกัดส่วน <span class="underline underline-offset-4 decoration-2 decoration-dotted">ส่วนเทคโนโลยีสารสนเทศ</span> สำนัก/คณะ <span class="underline decoration-dotted">สำนักหอสมุดและเทคโนโลยีสารสนเทศ</span>
                </div>
                <div class="text-left">
                    สถานะ <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ WorkStatus::getDescription($portfolioAcademic->personnel->work_status) }}</span>
                    วันที่เริ่มปฏิบัติงาน <span class="underline underline-offset-4 decoration-2 decoration-dotted">{{ thaiNumberDigit(Carbon::parse($portfolioAcademic->personnel->work_start_date)->thaidate('d F Y')) }}</span>
                </div>

                <div class="text-left mt-2 font-bold">
                    ๑. งานสอน
                </div>

                <div class="text-left mt-2">
                    <table class="table-auto w-full border border-black text-sm">
                        <thead>
                            <tr>
                                <th colspan="5" class="p-3 border border-black"></th>
                                <th colspan="3" class="text-center p-3 border border-black">จำนวนชั่วโมงที่สอน <br> ตลอดภาคการศึกษา</th>
                            </tr>
                            <tr>
                                <th rowspan="1" class="p-3 text-center border border-black">รายชื่อวิชา <br> (รหัส)</th>
                                <th rowspan="1" class="p-3 text-center border border-black">ระดับ <br> การศึกษา</th>
                                <th class="p-3 border border-black text-center">จำนวน <br> หน่วยกิต</th>
                                <th class="p-3 border border-black text-center">จำนวน <br> นิสิต</th>
                                <th class="p-3 border border-black text-center">บรรยาย</th>
                                <th class="p-3 border border-black text-center">ปฏิบัติการ</th>
                                <th class="p-3 border border-black text-center">วิทยานิพนธ์</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioAcademic->portfolioAcademicTeachings as $portfolioAcademicTeaching)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->level }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->number_of_credits }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->number_of_students }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->describe }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->operating }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicTeaching->thesis }}</td>
                            </tr>
                            @if ($portfolioAcademicTeaching->documents)
                            <tr>
                                <td colspan="7">

                                    ดาวน์โหลดเอกสาร:
                                    <div>
                                        <a href="{{ Storage::url($portfolioAcademicTeaching->documents) }}" target="_blank">
                                            {{ Storage::url($portfolioAcademicTeaching->documents) }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($portfolioAcademic->portfolioAcademicResearches->count() > 0)
    <div class="page">
        <div class="subpage">
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">

                <div class="text-left mt-2 font-bold">
                    ๒. งานวิจัย
                </div>
                @foreach($portfolioAcademic->portfolioAcademicResearches as $portfolioAcademicResearch)
                <div class="text-left">
                    {{ $loop->iteration }}. ชื่อเรื่อง <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->subject  !!} </span>
                </div>
                <div class="text-left">
                    {{ trans('filament.academic_time') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->time  !!} </span>
                </div>
                <div class="text-left">
                    {{ trans('filament.funding_source') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->funding_source  !!} </span>
                </div>
                <div class="text-left">
                    {{ trans('filament.budget') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->budget  !!} </span>
                </div>
                <div class="text-left">
                    {{ trans('filament.responsibility') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->responsibility  !!} </span>
                </div>
                <div class="text-left">
                    {{ trans('filament.number_of_researchers') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->responsibility  !!} </span>
                </div>


                <div class="text-left">
                    {{ trans('filament.research_achievements_and_progress') }} <span class="underline underline-offset-4 decoration-2 decoration-dotted">{!! $portfolioAcademicResearch->research_achievements_and_progress  !!} </span>
                </div>
                @if ($portfolioAcademicResearch->documents)
                <div class="text-left">
                    ดาวน์โหลดเอกสาร
                    <div>
                        <a href="{{ Storage::url($portfolioAcademicResearch->documents) }}" target="_blank">
                            {{ Storage::url($portfolioAcademicResearch->documents) }}
                        </a>
                    </div>
                </div>
                @endif

                @endforeach
            </div>
        </div>
    </div>
    @endif


    <div class="page">
        <div class="subpage">
            @if ($portfolioAcademic->portfolioAcademicStudentAdvisories->count() > 0)
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    ๓. งานที่ปรึกษาของนิสิต
                </div>

                <div class="text-left mt-2">

                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">รายละเอียด</th>
                                <th class="p-3 border border-black">ระดับการศึกษา</th>
                                <th class="p-3 border border-black">ดาวน์โหลดเอกสาร</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicStudentAdvisories as $portfolioAcademicStudentAdvisory)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicStudentAdvisory->subject }}</td>
                                <td class="p-3 border border-black text-center">{{ $portfolioAcademicStudentAdvisory->level }}</td>
                                <td class="p-3 border border-black text-center">
                                    @if ($portfolioAcademicStudentAdvisory->documents)
                                    <a href="{{ Storage::url($portfolioAcademicStudentAdvisory->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
            @endif

            @if ($portfolioAcademic->portfolioAcademicStudentActivityAdvisories->count() > 0)
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    ๔. งานที่ปรึกษากิจกรรมนิสิต
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="w-1/2 border border-black p-3">รายละเอียด</th>
                                <th class="w-1/2 border border-black p-3">ชื่อชมรม / หน้าที่</th>
                                <th class="w-1/2 border border-black p-3">ดาวน์โหลดเอกสาร</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicStudentActivityAdvisories as $portfolioAcademicStudentActivityAdvisory)
                            <tr>
                                <td class="p-3 border border-black text-left">{{ $portfolioAcademicStudentActivityAdvisory->subject }}</td>
                                <td class="p-3 border border-black text-left">{{ $portfolioAcademicStudentActivityAdvisory->description }}</td>
                                <td class="p-3 border border-black text-left">
                                    @if ($portfolioAcademicStudentActivityAdvisory->documents)
                                    <a href="{{ Storage::url($portfolioAcademicStudentActivityAdvisory->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if ($portfolioAcademic->portfolioAcademicWorks->count() > 0)
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    ๕. ผลงานทางวิชาการ
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="w-1/2 p-3 border border-black">ประเภทของงานวิชาการ</th>
                                <th class="w-1/2 p-3 border border-black">รายละเอียด</th>
                                <th class="w-1/2 p-3 border border-black">ดาวน์โหลดเอกสาร</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicWorks as $portfolioAcademicWork)
                            <tr>
                                <td class="p-3 border border-black text-left">{{ $portfolioAcademicWork->subject }}</td>
                                <td class="p-3 border border-black text-left">{{ $portfolioAcademicWork->description }}</td>
                                <td class="p-3 border border-black text-left">
                                    @if ($portfolioAcademicWork->documents)
                                    <a href="{{ Storage::url($portfolioAcademicWork->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-left break-after-all">
                        <strong>หมายเหตุ</strong> ๑) การเขียนตามข้อ 3, ๒, ๓, ๔, ๕, ๖ ให้ระบุตามหลักการเขียนเอกสารอ้างอิง ประกอบไปด้วย
                        ชื่อผู้แต่ง ปี พ.ศ. ชื่อเรื่อง แหล่งพิมพ์ จำนวนหน้า เป็นต้น
                        ๒) กรณีที่มีผู้เขียนหลายคนให้ระบุสัดส่วนในการเป็นเจ้าของผลงานร้อยละ
                        ๓) หากมีผลงานทางวิซาการในแต่ละภาคการศึกษาเป็นจำนวนมากและกรอกในแบบไม่พอ
                        ให้ทำเป็นเอกสารแนบ
                </div>
            </div>
            @endif

        </div>
    </div>


    @if ($portfolioAcademic->portfolioAcademicServices->count() > 0)
    <div class="page">
        <div class="subpage">
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    ๖. งานบริการทางวิชาการ
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">ข้อมูลเกี่ยวกับการไปปฏิบัติงานบริการวิชาการ</th>
                                <th class="p-3 border border-black">รายละเอียด</th>
                                <th class="p-3 border border-black">ดาวน์โหลดเอกสาร</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicServices as $portfolioAcademicService)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicService->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicService->description }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicService->documents)
                                    <a href="{{ Storage::url($portfolioAcademicService->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                   ๗. งานบริหาร
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">ตำแหน่ง</th>
                                <th class="p-3 border border-black">วาระตั้งแต่</th>
                                <th class="p-3 border border-black">ดาวน์โหลด</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicAdministrativeWorks as $portfolioAcademicAdministrativeWork)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicAdministrativeWork->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicAdministrativeWork->description }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicAdministrativeWork->documents)
                                    <a href="{{ Storage::url($portfolioAcademicAdministrativeWork->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @endif

    @if($portfolioAcademic->portfolioAcademicOtherWorks->count() > 0)
    <div class="page">
        <div class="subpage">
            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                    <strong>๘ งานอื่น ๆ</strong> <br>
                    ๘.๑ กรรมการ / คณะทำงาน
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">ชื่อคณะกรรมการ/คณะทำงาน</th>
                                <th class="p-3 border border-black">ตำแหน่ง</th>
                                <th class="p-3 border border-black">วาระตั้งแต่</th>
                                <th class="p-3 border border-black">
                                    จำนวนครั้ง <br>
                                    ที่เข้าประชุม
                                </th>
                                <th class="p-3 border border-black">เอกสาร</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioAcademic->portfolioAcademicOtherWorks as $portfolioAcademicOtherWork)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherWork->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherWork->position }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherWork->term_start }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherWork->number_of_participants }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicOtherWork->documents)
                                    <a href="{{ Storage::url($portfolioAcademicOtherWork->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                   ๘.๒ งานบริการแก่หน่วยงานอื่น เช่น รับเชิญเป็นพิธีกร วิทยากรหรืออื่น ๆ
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">ชื่อหน่วยงาน</th>
                                <th class="p-3 border border-black">หน้าที่ที่ได้รับมอบหมาย</th>
                                <th class="p-3 border border-black">เอกสาร</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioAcademic->portfolioAcademicOtherServices as $portfolioAcademicOtherService)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherService->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherService->description }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicOtherService->documents)
                                    <a href="{{ Storage::url($portfolioAcademicOtherService->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                   ๘.๓ ผลงานดีเด่นและรางวัลเกียรติคุณที่ได้รับในแต่ละรอบการประเมิน
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">ชื่อรางวัล/ผลงาน</th>
                                <th class="p-3 border border-black">แหล่งที่มอบ</th>
                                <th class="p-3 border border-black">เอกสาร</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioAcademic->portfolioAcademicOtherAwards as $portfolioAcademicOtherAward)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherAward->subject }}</td>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherAward->description }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicOtherAward->documents)
                                    <a href="{{ Storage::url($portfolioAcademicOtherAward->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid text-center grid-cols-1 gap-1 mt-2 text-xl ml-10">
                <div class="text-left mt-2 font-bold">
                   ๘.๔ ผลงานที่ประทับใจที่สุด
                </div>
                <div class="text-left mt-2">
                    <table class="table-auto w-full">
                        <thead class="text-center">
                            <tr>
                                <th class="p-3 border border-black">รายละเอียด</th>
                                <th class="p-3 border border-black">เอกสาร</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($portfolioAcademic->portfolioAcademicOtherImpresseds as $portfolioAcademicOtherImpressed)
                            <tr>
                                <td class="p-3 border border-black">{{ $portfolioAcademicOtherImpressed->description }}</td>
                                <td class="p-3 border border-black">
                                    @if ($portfolioAcademicOtherImpressed->documents)
                                    <a href="{{ Storage::url($portfolioAcademicOtherImpressed->documents) }}" target="_blank">
                                        ดาวน์โหลด
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @endif

    <div class="page">
        <div class="subpage">
            <div class="text-center mt-2">
                @include('reports.partials.footer-signature-position')
            </div>
        </div>
    </div>

</div>
</body>
</html>
