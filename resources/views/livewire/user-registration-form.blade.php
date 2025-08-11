<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('x'))
        <div class="alert alert-success">
            {{ session('x') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <!-- Full Name -->
       <!-- الاسم الكامل -->
<div class="mb-3">
    <label for="name" class="form-label">الاسم </label>
    <input type="text" class="form-control" id="name" placeholder="أدخل اسمك " wire:model="name">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<!-- البريد الإلكتروني -->


<!-- رقم الهاتف -->
<div class="mb-3">
    <label for="country" class="form-label">الدولة</label>
    <select class="form-select" id="country" wire:model="countryCode">

        <!-- الدول العربية -->
   <option value="+967" selected>🇾🇪 اليمن (+967)</option>

        <option value="+966">🇸🇦 السعودية (+966)</option>
        <option value="+20">🇪🇬 مصر (+20)</option>
        <option value="+971">🇦🇪 الإمارات (+971)</option>
        <option value="+965">🇰🇼 الكويت (+965)</option>
        <option value="+974">🇶🇦 قطر (+974)</option>
        <option value="+968">🇴🇲 عمان (+968)</option>
        <option value="+973">🇧🇭 البحرين (+973)</option>
        <option value="+964">🇮🇶 العراق (+964)</option>
        <option value="+962">🇯🇴 الأردن (+962)</option>
        <option value="+961">🇱🇧 لبنان (+961)</option>
        <option value="+963">🇸🇾 سوريا (+963)</option>
        <option value="+218">🇱🇾 ليبيا (+218)</option>
        <option value="+212">🇲🇦 المغرب (+212)</option>
        <option value="+216">🇹🇳 تونس (+216)</option>
        <option value="+213">🇩🇿 الجزائر (+213)</option>
        <option value="+249">🇸🇩 السودان (+249)</option>
        <option value="+222">🇲🇷 موريتانيا (+222)</option>
        <option value="+970">🇵🇸 فلسطين (+970)</option>
        <option value="+252">🇸🇴 الصومال (+252)</option>
        <option value="+269">🇰🇲 جزر القمر (+269)</option>
        <option value="+246">🇪🇷 إريتريا (+246)</option>
       <option value="+249">🇸🇩 السودان (+249)</option>
        <option value="+962">🇩🇯 جيبوتي (+253)</option>

        <!-- دول أجنبية شائعة -->
        <option value="+1">🇺🇸 الولايات المتحدة (+1)</option>
        <option value="+44">🇬🇧 المملكة المتحدة (+44)</option>
        <option value="+33">🇫🇷 فرنسا (+33)</option>
        <option value="+49">🇩🇪 ألمانيا (+49)</option>
        <option value="+39">🇮🇹 إيطاليا (+39)</option>
        <option value="+34">🇪🇸 إسبانيا (+34)</option>
        <option value="+7">🇷🇺 روسيا (+7)</option>
        <option value="+81">🇯🇵 اليابان (+81)</option>
        <option value="+86">🇨🇳 الصين (+86)</option>
        <option value="+91">🇮🇳 الهند (+91)</option>
        <option value="+90">🇹🇷 تركيا (+90)</option>
        <option value="+61">🇦🇺 أستراليا (+61)</option>
        <option value="+55">🇧🇷 البرازيل (+55)</option>
        <option value="+82">🇰🇷 كوريا الجنوبية (+82)</option>
        <option value="+98">🇮🇷 إيران (+98)</option>
        <option value="+60">🇲🇾 ماليزيا (+60)</option>
        <option value="+62">🇮🇩 إندونيسيا (+62)</option>
        <option value="+63">🇵🇭 الفلبين (+63)</option>
        <option value="+94">🇱🇰 سريلانكا (+94)</option>

        <!-- أضف المزيد من الدول حسب الحاجة -->
    </select>
    @error('countryCode')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">رقم الهاتف</label>
    <input type="text" class="form-control" id="phone" placeholder="أدخل رقم هاتفك بدون رمز الدولة" wire:model="phone">
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<!-- كلمة المرور -->
<div class="mb-3">
    <label for="password" class="form-label">كلمة المرور</label>
    <input type="text" class="form-control" id="password" placeholder="أدخل كلمة المرور" wire:model.defer="password">
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
            <input type="text" class="form-control" id="password_confirmation" placeholder="أعد كتابة كلمة المرور"
                wire:model.defer="password_confirmation">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3 text-center">
            <label for="bot-link" class="form-label">تسجيل الدخول في تلجرام</label><br>
            {{-- <a href="https://t.me/yamin77846_bot?start={{ urlencode($number_test) }}" target="_blank"
                class="btn btn-outline-success"> --}}
                <button wire:click="telegram_model" type="button" class="btn btn-primary" @if($stateTelegram) disabled
                @endif>
                    {{ $stateTelegram ? 'تم تسجيل الدخول' : 'إضافة مستخدم تيليجرام' }}
                </button>
                <!-- نافذة المودال -->
                <div class="modal fade" wire:ignore id="telegramModal" tabindex="-1"
                    aria-labelledby="telegramModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content text-end">

                            <!-- العنوان -->
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="telegramModalLabel">ادخال حساب التلجرام
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="إغلاق"></button>
                            </div>

                            <!-- المحتوى -->
                            <div class="modal-body text-center">
                                <p>📱 مسح الرمز لتسجيل على هاتف آخر</p>

                                <!-- صورة QR -->
                                {{-- <img src="" alt="QR Code" class="img-fluid mb-3"> --}}
                                <div class="d-flex justify-content-center">
                                    {!! DNS2D::getBarcodeHTML($teleurl, 'QRCODE') !!}
                                </div>
                                <p>أو قم بتسجيل عبر نسخ الكود وإرساله</p>
                                <p>{{ $teleurl }}</p>


                                <div class="input-group mb-3 w-75 mx-auto">
                                    <input type="text" class="form-control text-center" id="telegramCode"
                                        value="{{ $teleurl }}" readonly>
                                    <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button"
                                        onclick="copyTelegramCode()">📋
                                        نسخ</button>
                                </div>
                            </div>
                            <!-- الأزرار -->
                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                                    onclick="window.open('{{ $teleurl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('telegramModal')); modal.hide();">
                                    تسجيل على هذا الجهاز
                                </button>
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">❌ إغلاق</button>
                            </div>

                        </div>
                    </div>
                </div>
                <script>
                    window.addEventListener('open-telegram-modal', () => {
                        const modal = new bootstrap.Modal(document.getElementById('telegramModal'));
                        modal.show();
                    });
                </script>

                <script>
                    function copyTelegramCode() {
                        const input = document.getElementById("telegramCode");
                        input.select();
                        input.setSelectionRange(0, 99999); // للهواتف
                        document.execCommand("copy");
                        alert("✅ تم نسخ الكود: " + input.value);
                    }

                    function registerThisDevice() {
                        alert("🟢 جارٍ تسجيل هذا الجهاز...");
                        // هنا يمكنك استدعاء AJAX أو دالة أخرى
                    }

                </script>

                <script>
                    Livewire.on('open-telegram-modal', () => {
                        const modal = new bootstrap.Modal(document.getElementById('telegramModal'));
                        modal.show();
                    });


                </script>

        </div>
        {{-- @endif --}}
        <div class="mb-3 text-center">


            {{-- <a href="http://wa.me/+14155238886?text={{ urlencode($number_test) }}" target="_blank"
                class="btn btn-outline-success">

                <i class="bi bi-telegram"></i> Open whatsapp Bot
            </a> --}}


            <div class="mb-3 text-center">
                <label for="bot-link" class="form-label">تسجيل الدخول في وتساب</label><br>

                <button wire:click="whatsapp_model" type="button" class="btn btn-success" @if($statewhatapp)
                    disabled @endif>
                    {{ $statewhatapp ? 'تم تسجيل الدخول' : 'إضافة مستخدم واتساب' }}
                </button>

                <!-- نافذة المودال -->
                <div class="modal fade" wire:ignore id="whatsappModal" tabindex="-1"
                    aria-labelledby="whatsappModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content text-end">

                            <!-- العنوان -->
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="whatsappModalLabel">ادخال حساب واتساب</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="إغلاق"></button>
                            </div>

                            <!-- المحتوى -->
                            <div class="modal-body text-center">
                                <p>📱 امسح الرمز لتسجيل الدخول من جهاز آخر</p>

                                {{-- صورة QR مثلاً --}}
                                {{-- <img src="{{ $whatsappQr }}" alt="QR Code" class="img-fluid mb-3"> --}}
                                <div class="d-flex justify-content-center">

                                    {!! DNS2D::getBarcodeHTML($whatsappUrl, 'QRCODE') !!}
                                </div>
                                <p>أو انسخ الرابط وأرسله عبر واتساب</p>
                                <p>{{ $whatsappUrl }}</p>

                                <div class="input-group mb-3 w-75 mx-auto">
                                    <input type="text" class="form-control text-center" id="whatsappCode"
                                        value="{{ $whatsappUrl }}" readonly>
                                    <button class="btn btn-outline-success" data-bs-dismiss="modal" type="button"
                                        onclick="copyWhatsappCode()">📋 نسخ</button>
                                </div>
                            </div>

                            <!-- الأزرار -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    onclick="window.open('{{ $whatsappUrl }}', '_blank'); var modal = bootstrap.Modal.getInstance(document.getElementById('whatsappModal')); modal.hide();">
                                    تسجيل على هذا الجهاز
                                </button>
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">❌ إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
document.addEventListener('DOMContentLoaded', () => {
    Livewire.on('whatsapp-added', () => {
        const modalEl = document.getElementById('whatsappModal');



        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.show();

    });
});
</script>

                <!-- سكربت نسخ الرابط -->
                <script>
                    function copyWhatsappCode() {
                        const input = document.getElementById("whatsappCode");
                        input.select();
                        input.setSelectionRange(0, 99999); // للهواتف
                        document.execCommand("copy");
                        alert("✅ تم نسخ الرابط: " + input.value);
                    }
                </script>
            </div>


        </div>


        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </div>
    </form>
</div>
