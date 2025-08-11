<div>
    <li class="nav-item dropdown notification_dropdown">
        <div class="d-flex align-items-center gap-2">
<style>
                @keyframes blink {

                    0%,
                    100% {
                        opacity: 1;
                    }

                    50% {
                        opacity: 0.2;
                    }
                }

                .blinking {
                    animation: blink 1s infinite;
                }
            </style>
            {{-- متصل / غير متصل بجهاز الحماية --}}
            @if ($buttery_info->change == '1')
                <i class="fas fa-link fa-2x " title=" متصل بجهز الحماية"  ></i>
            @endif

            @if ($buttery_info->change == '0')
                <i class="fas fa-unlink fa-2x blinking" style="color: #ff0505;" title="غير متصل بجهاز الحماية"></i>
            @endif

            @if ($buttery_info->change )

            {{-- الكهرباء --}}
            @if ($buttery_info->electrical == '1')
                <i class="fas fa-plug fa-2x" style="color: #3de145;" title="الكهرباء موجودة (متصل بالشبكة)"></i>
            @endif

            @if ($buttery_info->electrical == '0')
                <i class="fas fa-plug fa-2x blinking" style="color: #ff0505;"
                    title="الكهرباء غير موجودة (غير متصل بالشبكة)"></i>
            @endif



            @if ($buttery_info->is_solar_battery == '1')
                <i class="fas fa-solar-panel fa-2x" style="color: #3498db;" title="بطارية شمسية موجودة"></i>
            @else
                <i class="fas fa-solar-panel fa-2x blinking" style="color: #e74c3c;"
                    title="البطارية الشمسية غير موجودة"></i>
            @endif



            {{-- حالة الإنذار --}}
            @if ($buttery_info->is_alart == '1')
                <i class="fas fa-exclamation-triangle fa-2x blinking" style="color: #f31212;" title="! قام الجهز بتشغيل الانذارات"></i>
            @endif

            {{-- لون البطارية بناءً على وجودها --}}
            @php
                $battery_color = ($buttery_info->electrical == '0' && $buttery_info->is_solar_battery =='0') ? 'color: #e13d3d;' : '';
            @endphp

            {{-- مستويات البطارية --}}
            @if ($buttery_info->velue == '0')
                <i class="fas fa-battery-empty fa-2x blinking" title="0%" style="color: #e13d3d;"></i>
            @endif

            @if ($buttery_info->velue == '20')
                <i class="fas fa-battery-empty fa-2x" title="20%" style="{{ $battery_color }}"></i>
            @endif

            @if ($buttery_info->velue == '50')
                <i class="fas fa-battery-half fa-2x" title="50%" style="{{ $battery_color }}"></i>
            @endif

            @if ($buttery_info->velue == '70')
                <i class="fas fa-battery-three-quarters fa-2x" title="70%" style="{{ $battery_color }}"></i>
            @endif

            @if ($buttery_info->velue === '100')
                <i class="fas fa-battery-full fa-2x" title="100%" style="{{ $battery_color }}"></i>
            @endif
            @endif

            {{-- الرصيد --}}
            <div>{{ $many }}$</div>

        </div>
    </li>
</div>
