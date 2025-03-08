<div class="grid text-center grid-cols-2 gap-1 mt-5 text-xl">
    <div>
        <div>
            ลงชื่อ.............................................ผู้รับการประเมิน
        </div>
        <div>
            ({{ $portfolio->personnel->prefix->name }}{{ $portfolio->personnel->full_name }})<br/>
        </div>
        <div>
            ตำแหน่ง {{ $portfolio->personnel->position->name }} <br>
            ........../........../.........
        </div>
    </div>
    <div>
        <div>
            ลงชื่อ..........................................................ผู้บังคับบัญชาชั้นต้น
        </div>
        <div>
            ตำแหน่ง ผู้อำนวยการ
        </div>
    </div>
</div>
