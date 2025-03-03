@php use App\Models\Portfolio;use App\Models\PortfolioItem;use App\Models\PortfolioType; @endphp

<div class="text-left ml-5 text-bold">๒.ผลสำเร็จของงานหรือความก้าวหน้าของงานตามข้อ ๑ ในช่วงระยะเวลาของการประเมิน : โปรดระบุผลสำเร็จของงานที่สำคัญหรือผลงานที่เกี่ยวข้องกับหน้าที่ความรับผิดชอบหลัก ตามที่ระบุในข้อ ๑ ในช่วงการประเมิน</div>

@foreach(PortfolioType::where('is_visible', true)->orderBy('sort')->get() as $type)
    <div class="text-left ml-5 text-bold">{{ $type->name }}</div>

    @if (PortfolioItem::where('portfolio_id', $portfolio->id)->where('portfolio_type_id', $type->id)->count() > 0)
        <div class="text-left ml-5">
            <ul class="ml-5">
                @foreach(PortfolioItem::where('portfolio_id', $portfolio->id)->where('portfolio_type_id', $type->id)->orderBy('sort')->get() as $item)
                    <li>
                        {{ thaiNumberDigit($loop->iteration) }}. {{ $item->name }}
                        <ul class="ml-5">
                            <li>{{ $item->result }}</li>
                        </ul>
                    </li>
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
