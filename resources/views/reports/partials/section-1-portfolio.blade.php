@php use App\Models\Portfolio;use App\Models\PortfolioItem;use App\Models\PortfolioType; @endphp

<div class="text-left ml-5 text-bold">
    ๑.หน้าที่ความรับผิดชอบหลักที่เป็นงานประจำในช่วงระยะเวลาของการประเมินผลการปฏิบัติงาน<br>
    โปรดเรียงลำดับตามความสำคัญถึงภารกิจที่บุคลากรรับผิดชอบในช่วงการประเมิน
</div>

@foreach(PortfolioType::where('is_visible', true)->orderBy('sort')->get() as $type)
    <div class="text-left ml-5 text-bold">{{ $type->name }}</div>

    @if (PortfolioItem::where('portfolio_id', $portfolio->id)->where('portfolio_type_id', $type->id)->count() > 0)
        <div class="text-left ml-5">
            <ul class="ml-5">
                @foreach(PortfolioItem::where('portfolio_id', $portfolio->id)->where('portfolio_type_id', $type->id)->orderBy('sort')->get() as $item)
                    <li>{{ thaiNumberDigit($loop->iteration) }}. {{ $item->name }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="text-left ml-5">
            <ul class="ml-5">
                <li>ไม่มี</li>
            </ul>
        </div>
    @endif
@endforeach
