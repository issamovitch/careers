@foreach($fields2 as $field)
    <div class="form-group">
        @if($field->type!="file")
            <label for="field{{$location}}_{{$field->id}}">{{$field->name}} @if($field->required==1) <span
                        class="red">*</span> @endif</label>
        @endif
        @if($field->type=="text")
            <input type="text" name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                   class="form-control" @if($field->required==1) required @endif placeholder="{{$field->placeholder}}">
        @elseif($field->type=="name")
            <input type="text" name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                   class="form-control" @if($field->required==1) required @endif placeholder="{{$field->placeholder}}">
        @elseif($field->type=="email")
            <input type="email" name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                   class="form-control" @if($field->required==1) required @endif placeholder="{{$field->placeholder}}">
        @elseif($field->type=="textarea")
            <textarea name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                      class="form-control" @if($field->required==1) required @endif rows="2"
                      placeholder="{{$field->placeholder}}"></textarea>
        @elseif($field->type=="date")
            <div class="input-group">
                <input type="text" name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                       class="datepicker form-control" @if($field->required==1) required
                       @endif placeholder="{{$field->placeholder}}">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        @elseif($field->type=="time")
            <div class="input-group">
                <input type="text" name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                       class="timepicker form-control" @if($field->required==1) required
                       @endif placeholder="{{$field->placeholder}}">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            </div>
        @elseif($field->type=="select")
            <select name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                    class="form-control select2x" @if($field->required==1) required @endif>
                @foreach(explode(",", $field->options) as $o)
                    <option value="{{$o}}">{{$o}}</option>@endforeach
            </select>
            <small>{{$field->placeholder}}</small>
        @elseif($field->type=="country")
            <select name="field{{$location}}_{{$field->id}}" id="field{{$location}}_{{$field->id}}"
                    class="form-control" @if($field->required==1) required @endif>
                <option disabled selected> اختر الدولة</option>
                <option value="اثيوبيا    "> اثيوبيا</option>
                <option value="اريتريا    "> اريتريا</option>
                <option value="استونيا    "> استونيا</option>
                <option value="الاكوادور    "> الاكوادور</option>
                <option value="الامارات العربية المتحدة">الامارات العربية المتحدة</option>
                <option value="الأرجنتين    "> الأرجنتين</option>
                <option value="الأردن    "> الأردن</option>
                <option value="الباهاما    "> الباهاما</option>
                <option value="البحرين    "> البحرين</option>
                <option value="البرازيل    "> البرازيل</option>
                <option value="البرتغال    "> البرتغال</option>
                <option value="البوسنة والهرسك    "> البوسنة والهرسك</option>
                <option value="الجزائر    "> الجزائر</option>
                <option value="الدنمارك    "> الدنمارك</option>
                <option value="الدومينيكان     "> الدومينيكان</option>
                <option value="السلفادور    "> السلفادور</option>
                <option value="    السنغال    "> السنغال</option>
                <option value="    السودان    "> السودان</option>
                <option value="    السويد    "> السويد</option>
                <option value="    الصومال    "> الصومال</option>
                <option value="    العراق    "> العراق</option>
                <option value="    الغابون    "> الغابون</option>
                <option value="    الفلبين    "> الفلبين</option>
                <option value="    الكاميرون    "> الكاميرون</option>
                <option value="    الكوستاريكية    "> الكوستاريكية</option>
                <option value="    الكونغو    "> الكونغو</option>
                <option value="    الكويت    "> الكويت</option>
                <option value="    المجر    "> المجر</option>
                <option value="    المغرب    "> المغرب</option>
                <option value="    المكسيك    "> المكسيك</option>
                <option value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                <option value="    المملكة المتحدة    "> المملكة المتحدة</option>
                <option value="    النرويج    "> النرويج</option>
                <option value="    النمسا    "> النمسا</option>
                <option value="    النيجر    "> النيجر</option>
                <option value="    الهند    "> الهند</option>
                <option value="الولايات المتحدة الأمريكية">الولايات المتحدة الأمريكية</option>
                <option value="    اليابان    "> اليابان</option>
                <option value="    اليمن    "> اليمن</option>
                <option value="    اليونان    "> اليونان</option>
                <option value="    اندونيسيا    "> اندونيسيا</option>
                <option value="    ايطاليا    "> ايطاليا</option>
                <option value="    أذربيجان    "> أذربيجان</option>
                <option value="    أرمينيا    "> أرمينيا</option>
                <option value="    أسبانيا    "> أسبانيا</option>
                <option value="    أستراليا    "> أستراليا</option>
                <option value="    أفغانستان    "> أفغانستان</option>
                <option value="    ألمانيا    "> ألمانيا</option>
                <option value="    أنجولا    "> أنجولا</option>
                <option value="    أنجويلا    "> أنجويلا</option>
                <option value="    أندورا    "> أندورا</option>
                <option value="    أوروغواي    "> أوروغواي</option>
                <option value="    أوزبكستان    "> أوزبكستان</option>
                <option value="    أوغندا    "> أوغندا</option>
                <option value="    أوكرانيا    "> أوكرانيا</option>
                <option value="    أيرلاندا    "> أيرلاندا</option>
                <option value="    أيسلندا    "> أيسلندا</option>
                <option value="    إيران    "> إيران</option>
                <option value="    باراجواي    "> باراجواي</option>
                <option value="    باربادوس    "> باربادوس</option>
                <option value="    باكستان    "> باكستان</option>
                <option value="    بالاو    "> بالاو</option>
                <option value="    بتسوانا    "> بتسوانا</option>
                <option value="    بروناي    "> بروناي</option>
                <option value="    بلجيكا    "> بلجيكا</option>
                <option value="    بلغاريا    "> بلغاريا</option>
                <option value="    بنجلاديش    "> بنجلاديش</option>
                <option value="    بنما    "> بنما</option>
                <option value="    بنين    "> بنين</option>
                <option value="    بوركينافاسو    "> بوركينافاسو</option>
                <option value="    بوروندي    "> بوروندي</option>
                <option value="    بولندا    "> بولندا</option>
                <option value="    بوليفيا    "> بوليفيا</option>
                <option value="    بيرو    "> بيرو</option>
                <option value="    تايلاند    "> تايلاند</option>
                <option value="    تايوان    "> تايوان</option>
                <option value="    تركمانستان    "> تركمانستان</option>
                <option value="    تركيا    "> تركيا</option>
                <option value="    ترينيداد وتوباغو    "> ترينيداد وتوباغو</option>
                <option value="    تشاد    "> تشاد</option>
                <option value="    تنزانيا    "> تنزانيا</option>
                <option value="    توغو    "> توغو</option>
                <option value="    تونس    "> تونس</option>
                <option value="    تيمور الشرقية    "> تيمور الشرقية</option>
                <option value="    جامايكا    "> جامايكا</option>
                <option value="    جرينلاند    "> جرينلاند</option>
                <option value="    جزر المالديف    "> جزر المالديف</option>
                <option value="    جزر سليمان    "> جزر سليمان</option>
                <option value="    جزر فارو    "> جزر فارو</option>
                <option value="    جمهورية افريقيا الوسطى    "> جمهورية افريقيا الوسطى</option>
                <option value="    جمهورية التشيك    "> جمهورية التشيك</option>
                <option value="    جمهورية الكونغو الديمقراطية    "> جمهورية الكونغو الديمقراطية</option>
                <option value="    جنوب إفريقيا    "> جنوب إفريقيا</option>
                <option value="    جواتيمالا    "> جواتيمالا</option>
                <option value="    جورجيا    "> جورجيا</option>
                <option value="    جيبوتي    "> جيبوتي</option>
                <option value="    رواندا    "> رواندا</option>
                <option value="    روسيا    "> روسيا</option>
                <option value="    روسيا البيضاء    "> روسيا البيضاء</option>
                <option value="    رومانيا    "> رومانيا</option>
                <option value="    زامبيا    "> زامبيا</option>
                <option value="    زيمبابوي    "> زيمبابوي</option>
                <option value="    ساحل العاج    "> ساحل العاج</option>
                <option value="    ساموا    "> ساموا</option>
                <option value="    سان مارينو    "> سان مارينو</option>
                <option value="    سريلانكا    "> سريلانكا</option>
                <option value="    سلطنة عمان    "> سلطنة عمان</option>
                <option value="    سلوفاكيا    "> سلوفاكيا</option>
                <option value="    سلوفينيا    "> سلوفينيا</option>
                <option value="    سنغافورة    "> سنغافورة</option>
                <option value="    سوازيلاند    "> سوازيلاند</option>
                <option value="    سوريا    "> سوريا</option>
                <option value="    سورينام    "> سورينام</option>
                <option value="    سويسرا    "> سويسرا</option>
                <option value="    سيراليون    "> سيراليون</option>
                <option value="    سيشيل    "> سيشيل</option>
                <option value="    شيلي    "> شيلي</option>
                <option value="    صربيا والجبل الاسود    "> صربيا والجبل الاسود</option>
                <option value="طاجكستان    "> طاجكستان</option>
                <option value="غامبيا    "> غامبيا</option>
                <option value="غانا    "> غانا</option>
                <option value="غوام    "> غوام</option>
                <option value="غيانا    "> غيانا</option>
                <option value="غيانا    "> غيانا</option>
                <option value="غينيا    "> غينيا</option>
                <option value="غينيا الاستوائية    "> غينيا الاستوائية</option>
                <option value="غينيا بيساو    "> غينيا بيساو</option>
                <option value="فرنسا    "> فرنسا</option>
                <option value="فلسطين    "> فلسطين</option>
                <option value="فنزويلا    "> فنزويلا</option>
                <option value="فنلندا    "> فنلندا</option>
                <option value="فيتنام    "> فيتنام</option>
                <option value="فيجي    "> فيجي</option>
                <option value="قبرص    "> قبرص</option>
                <option value="قطر    "> قطر</option>
                <option value="قيرغيزستان    "> قيرغيزستان</option>
                <option value="كالودونيا الجديدة    "> كالودونيا الجديدة</option>
                <option value="كرواتيا    "> كرواتيا</option>
                <option value="كمبوديا    "> كمبوديا</option>
                <option value="كندا    "> كندا</option>
                <option value="كوبا    "> كوبا</option>
                <option value="كوريا الجنوبية    "> كوريا الجنوبية</option>
                <option value="كوريا الشمالية    "> كوريا الشمالية</option>
                <option value="كولومبيا    "> كولومبيا</option>
                <option value="لاتفيا    "> لاتفيا</option>
                <option value="لاوس    "> لاوس</option>
                <option value="لبنان    "> لبنان</option>
                <option value="لوكسمبورج    "> لوكسمبورج</option>
                <option value="ليبيا    "> ليبيا</option>
                <option value="ليبيريا    "> ليبيريا</option>
                <option value="ليتوانيا    "> ليتوانيا</option>
                <option value="ليختنشتاين    "> ليختنشتاين</option>
                <option value="ليسوتو    "> ليسوتو</option>
                <option value="ماكاو    "> ماكاو</option>
                <option value="مالاوي    "> مالاوي</option>
                <option value="مالطا    "> مالطا</option>
                <option value="مالي    "> مالي</option>
                <option value="ماليزيا    "> ماليزيا</option>
                <option value="مايوت    "> مايوت</option>
                <option value="مدغشقر    "> مدغشقر</option>
                <option value="مدينة الفاتيكان    "> مدينة الفاتيكان</option>
                <option value="مصر    "> مصر</option>
                <option value="مقدونيا    "> مقدونيا</option>
                <option value="منغوليا    "> منغوليا</option>
                <option value="موريتانيا    "> موريتانيا</option>
                <option value="موزامبيق    "> موزامبيق</option>
                <option value="مولدافيا    "> مولدافيا</option>
                <option value="موناكو    "> موناكو</option>
                <option value="ميانمار    "> ميانمار</option>
                <option value="ناميبيا    "> ناميبيا</option>
                <option value="نيجيريا    "> نيجيريا</option>
                <option value="نيكاراجوا    "> نيكاراجوا</option>
                <option value="نيوزلتدا    "> نيوزلتدا</option>
                <option value="نيوي    "> نيوي</option>
                <option value="هايتي    "> هايتي</option>
                <option value="هندوراس    "> هندوراس</option>
                <option value="هولندا    "> هولندا</option>
                <option value="هونغ كونغ    "> هونغ كونغ</option>
            </select>
            <small>{{$field->placeholder}}</small>
        @elseif($field->type=="multiple")
            <select name="field{{$location}}_{{$field->id}}[]" id="field{{$location}}_{{$field->id}}"
                    class="form-control select2x" @if($field->required==1) required @endif multiple>
                @foreach(explode(",", $field->options) as $o)
                    <option value="{{$o}}">{{$o}}</option>
                @endforeach
            </select>
            <small>{{$field->placeholder}}</small>
        @elseif($field->type=="file")
            <input type="file" name="file{{$location}}_{{$field->id}}" id="file{{$location}}_{{$field->id}}"
                   class="form-control" accept="image/*,application/msword,application/pdf"
                   @if($field->required==1) required @endif placeholder="{{$field->placeholder}}">
            <small>{{$field->placeholder}}</small>
        @endif
    </div>
@endforeach
