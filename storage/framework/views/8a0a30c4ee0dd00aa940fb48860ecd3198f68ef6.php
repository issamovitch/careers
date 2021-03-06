<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <title>أنشئ حسابك الشخصي</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Said Asebbane">
    <link href="<?php echo e(asset("public/front/css/bootstrap.min.css")); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset("public/front/css/paper-bootstrap-wizard.css")); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset("public/front/css/font-awesome.min.css")); ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cairo:400,300' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('<?php echo e(asset("public/front/images/paper-1.jpg")); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <script>var uurl = "<?php echo e(route('add')); ?>";</script>

                        <form id="Form" name="form" method="post" action="<?php echo e(route("add")); ?>" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title">أنشئ حسابك الشخصي</h3>
                                <p class="category">هذه المعلومات سوف تتيح لنا معرفة المزيد عنك.</p>
                            </div>
                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div id="wid" class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li> <a href="#about" data-toggle="tab">
                                            <div class="icon-circle"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                            عنك </a> </li>
                                    <li> <a href="#account" data-toggle="tab">
                                            <div class="icon-circle"> <i class="fa fa-briefcase" aria-hidden="true"></i> </div>
                                            العمل </a> </li>
                                    <li> <a href="#address" data-toggle="tab">
                                            <div class="icon-circle"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
                                            العنوان </a> </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="loader">

                                <div class="row">
                                    <div style="text-align:center; padding-top:20px"><img width="100" src="<?php echo e(asset("public/front/images/loader.gif")); ?>" /></div>
                                </div>

                            </div>
                            <div class="tab-content result">

                                <div class="row">
                                    <h5 class="info-text gren"> تشرفنا بمعرفتك</h5>
                                    <h5 class="info-text gren"> تم تسجيلك بنجاح...</h5>
                                </div>

                            </div>

                            <div class="tab-content sender">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h5 class="info-text"> من فضلك قل لنا المزيد عن نفسك.</h5>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture"> <img src="<?php echo e(asset("public/front/images/default-avatar.jpg")); ?>" class="picture-src" id="wizardPicturePreview" title="" />
                                                    <input class="file" id="wizard-picture" name="monfichier" type="file" >
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                                                </div>
                                                <h6>اختر صورة</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>الإسم الشخصي <small>(اجباري)</small></label>
                                                <input name="Firstname" type="text" class="form-control" placeholder="سعيد...">
                                            </div>
                                            <div class="form-group">
                                                <label>الإسم العائلي <small>(اجباري)</small></label>
                                                <input name="Lastname" type="text" class="form-control" placeholder="محمد...">
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>البريد الإلكتروني <small>(اجباري)</small></label>
                                                <input name="Email" type="email" class="form-control" placeholder="said@santakrouz.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h5 class="info-text"> مالذي تجيده ؟ </h5>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <input type="hidden" id="location" name="location" value="0">
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio" data-val="1">
                                                    <div class="card card-checkboxes card-hover-effect"> <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                        <p>مصمم</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio" data-val="2">
                                                    <div class="card card-checkboxes card-hover-effect"> <i class="fa fa-code" aria-hidden="true"></i>
                                                        <p>مكود</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-radio" data-val="3">
                                                    <div class="card card-checkboxes card-hover-effect"> <i class="fa fa-database" aria-hidden="true"></i>
                                                        <p>مبرمج</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="info-text"> هل تعيش في منطقة جميلة؟ </h5>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>اسم الشارع</label>
                                                <input type="text" name="Street" class="form-control" placeholder="ابن بطوطة">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>رقم الشارع</label>
                                                <input type="text" name="Nstreet" class="form-control" placeholder="242">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>المدينة</label>
                                                <input type="text" name="City" class="form-control" placeholder="أكادير">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>الدولة</label>
                                                <br>
                                                <input type="hidden" name="Country" value=" ">
                                                <select name="Country" class="form-control">
                                                    <option disabled selected> اختر الدولة </option>
                                                    <option value="اثيوبيا    "> اثيوبيا </option>
                                                    <option value="اريتريا    "> اريتريا </option>
                                                    <option value="استونيا    "> استونيا </option>
                                                    <option value="الاكوادور    "> الاكوادور </option>
                                                    <option value="الامارات العربية المتحدة">الامارات العربية المتحدة</option>
                                                    <option value="الأرجنتين    "> الأرجنتين </option>
                                                    <option value="الأردن    "> الأردن </option>
                                                    <option value="الباهاما    "> الباهاما </option>
                                                    <option value="البحرين    "> البحرين </option>
                                                    <option value="البرازيل    "> البرازيل </option>
                                                    <option value="البرتغال    "> البرتغال </option>
                                                    <option value="البوسنة والهرسك    "> البوسنة والهرسك </option>
                                                    <option value="الجزائر    "> الجزائر </option>
                                                    <option value="الدنمارك    "> الدنمارك </option>
                                                    <option value="الدومينيكان     "> الدومينيكان </option>
                                                    <option value="السلفادور    "> السلفادور </option>
                                                    <option value="    السنغال    "> السنغال </option>
                                                    <option value="    السودان    "> السودان </option>
                                                    <option value="    السويد    "> السويد </option>
                                                    <option value="    الصومال    "> الصومال </option>
                                                    <option value="    العراق    "> العراق </option>
                                                    <option value="    الغابون    "> الغابون </option>
                                                    <option value="    الفلبين    "> الفلبين </option>
                                                    <option value="    الكاميرون    "> الكاميرون </option>
                                                    <option value="    الكوستاريكية    "> الكوستاريكية </option>
                                                    <option value="    الكونغو    "> الكونغو </option>
                                                    <option value="    الكويت    "> الكويت </option>
                                                    <option value="    المجر    "> المجر </option>
                                                    <option value="    المغرب    "> المغرب </option>
                                                    <option value="    المكسيك    "> المكسيك </option>
                                                    <option value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                                                    <option value="    المملكة المتحدة    "> المملكة المتحدة </option>
                                                    <option value="    النرويج    "> النرويج </option>
                                                    <option value="    النمسا    "> النمسا </option>
                                                    <option value="    النيجر    "> النيجر </option>
                                                    <option value="    الهند    "> الهند </option>
                                                    <option value="الولايات المتحدة الأمريكية">الولايات المتحدة الأمريكية</option>
                                                    <option value="    اليابان    "> اليابان </option>
                                                    <option value="    اليمن    "> اليمن </option>
                                                    <option value="    اليونان    "> اليونان </option>
                                                    <option value="    اندونيسيا    "> اندونيسيا </option>
                                                    <option value="    ايطاليا    "> ايطاليا </option>
                                                    <option value="    أذربيجان    "> أذربيجان </option>
                                                    <option value="    أرمينيا    "> أرمينيا </option>
                                                    <option value="    أسبانيا    "> أسبانيا </option>
                                                    <option value="    أستراليا    "> أستراليا </option>
                                                    <option value="    أفغانستان    "> أفغانستان </option>
                                                    <option value="    ألمانيا    "> ألمانيا </option>
                                                    <option value="    أنجولا    "> أنجولا </option>
                                                    <option value="    أنجويلا    "> أنجويلا </option>
                                                    <option value="    أندورا    "> أندورا </option>
                                                    <option value="    أوروغواي    "> أوروغواي </option>
                                                    <option value="    أوزبكستان    "> أوزبكستان </option>
                                                    <option value="    أوغندا    "> أوغندا </option>
                                                    <option value="    أوكرانيا    "> أوكرانيا </option>
                                                    <option value="    أيرلاندا    "> أيرلاندا </option>
                                                    <option value="    أيسلندا    "> أيسلندا </option>
                                                    <option value="    إيران    "> إيران </option>
                                                    <option value="    باراجواي    "> باراجواي </option>
                                                    <option value="    باربادوس    "> باربادوس </option>
                                                    <option value="    باكستان    "> باكستان </option>
                                                    <option value="    بالاو    "> بالاو </option>
                                                    <option value="    بتسوانا    "> بتسوانا </option>
                                                    <option value="    بروناي    "> بروناي </option>
                                                    <option value="    بلجيكا    "> بلجيكا </option>
                                                    <option value="    بلغاريا    "> بلغاريا </option>
                                                    <option value="    بنجلاديش    "> بنجلاديش </option>
                                                    <option value="    بنما    "> بنما </option>
                                                    <option value="    بنين    "> بنين </option>
                                                    <option value="    بوركينافاسو    "> بوركينافاسو </option>
                                                    <option value="    بوروندي    "> بوروندي </option>
                                                    <option value="    بولندا    "> بولندا </option>
                                                    <option value="    بوليفيا    "> بوليفيا </option>
                                                    <option value="    بيرو    "> بيرو </option>
                                                    <option value="    تايلاند    "> تايلاند </option>
                                                    <option value="    تايوان    "> تايوان </option>
                                                    <option value="    تركمانستان    "> تركمانستان </option>
                                                    <option value="    تركيا    "> تركيا </option>
                                                    <option value="    ترينيداد وتوباغو    "> ترينيداد وتوباغو </option>
                                                    <option value="    تشاد    "> تشاد </option>
                                                    <option value="    تنزانيا    "> تنزانيا </option>
                                                    <option value="    توغو    "> توغو </option>
                                                    <option value="    تونس    "> تونس </option>
                                                    <option value="    تيمور الشرقية    "> تيمور الشرقية </option>
                                                    <option value="    جامايكا    "> جامايكا </option>
                                                    <option value="    جرينلاند    "> جرينلاند </option>
                                                    <option value="    جزر المالديف    "> جزر المالديف </option>
                                                    <option value="    جزر سليمان    "> جزر سليمان </option>
                                                    <option value="    جزر فارو    "> جزر فارو </option>
                                                    <option value="    جمهورية افريقيا الوسطى    "> جمهورية افريقيا الوسطى </option>
                                                    <option value="    جمهورية التشيك    "> جمهورية التشيك </option>
                                                    <option value="    جمهورية الكونغو الديمقراطية    "> جمهورية الكونغو الديمقراطية </option>
                                                    <option value="    جنوب إفريقيا    "> جنوب إفريقيا </option>
                                                    <option value="    جواتيمالا    "> جواتيمالا </option>
                                                    <option value="    جورجيا    "> جورجيا </option>
                                                    <option value="    جيبوتي    "> جيبوتي </option>
                                                    <option value="    رواندا    "> رواندا </option>
                                                    <option value="    روسيا    "> روسيا </option>
                                                    <option value="    روسيا البيضاء    "> روسيا البيضاء </option>
                                                    <option value="    رومانيا    "> رومانيا </option>
                                                    <option value="    زامبيا    "> زامبيا </option>
                                                    <option value="    زيمبابوي    "> زيمبابوي </option>
                                                    <option value="    ساحل العاج    "> ساحل العاج </option>
                                                    <option value="    ساموا    "> ساموا </option>
                                                    <option value="    سان مارينو    "> سان مارينو </option>
                                                    <option value="    سريلانكا    "> سريلانكا </option>
                                                    <option value="    سلطنة عمان    "> سلطنة عمان </option>
                                                    <option value="    سلوفاكيا    "> سلوفاكيا </option>
                                                    <option value="    سلوفينيا    "> سلوفينيا </option>
                                                    <option value="    سنغافورة    "> سنغافورة </option>
                                                    <option value="    سوازيلاند    "> سوازيلاند </option>
                                                    <option value="    سوريا    "> سوريا </option>
                                                    <option value="    سورينام    "> سورينام </option>
                                                    <option value="    سويسرا    "> سويسرا </option>
                                                    <option value="    سيراليون    "> سيراليون </option>
                                                    <option value="    سيشيل    "> سيشيل </option>
                                                    <option value="    شيلي    "> شيلي </option>
                                                    <option value="    صربيا والجبل الاسود    "> صربيا والجبل الاسود </option>
                                                    <option value="طاجكستان    "> طاجكستان </option>
                                                    <option value="غامبيا    "> غامبيا </option>
                                                    <option value="غانا    "> غانا </option>
                                                    <option value="غوام    "> غوام </option>
                                                    <option value="غيانا    "> غيانا </option>
                                                    <option value="غيانا    "> غيانا </option>
                                                    <option value="غينيا    "> غينيا </option>
                                                    <option value="غينيا الاستوائية    "> غينيا الاستوائية </option>
                                                    <option value="غينيا بيساو    "> غينيا بيساو </option>
                                                    <option value="فرنسا    "> فرنسا </option>
                                                    <option value="فلسطين    "> فلسطين</option>
                                                    <option value="فنزويلا    "> فنزويلا </option>
                                                    <option value="فنلندا    "> فنلندا </option>
                                                    <option value="فيتنام    "> فيتنام </option>
                                                    <option value="فيجي    "> فيجي </option>
                                                    <option value="قبرص    "> قبرص </option>
                                                    <option value="قطر    "> قطر </option>
                                                    <option value="قيرغيزستان    "> قيرغيزستان </option>
                                                    <option value="كالودونيا الجديدة    "> كالودونيا الجديدة </option>
                                                    <option value="كرواتيا    "> كرواتيا </option>
                                                    <option value="كمبوديا    "> كمبوديا </option>
                                                    <option value="كندا    "> كندا </option>
                                                    <option value="كوبا    "> كوبا </option>
                                                    <option value="كوريا الجنوبية    "> كوريا الجنوبية </option>
                                                    <option value="كوريا الشمالية    "> كوريا الشمالية </option>
                                                    <option value="كولومبيا    "> كولومبيا </option>
                                                    <option value="لاتفيا    "> لاتفيا </option>
                                                    <option value="لاوس    "> لاوس </option>
                                                    <option value="لبنان    "> لبنان </option>
                                                    <option value="لوكسمبورج    "> لوكسمبورج </option>
                                                    <option value="ليبيا    "> ليبيا </option>
                                                    <option value="ليبيريا    "> ليبيريا </option>
                                                    <option value="ليتوانيا    "> ليتوانيا </option>
                                                    <option value="ليختنشتاين    "> ليختنشتاين </option>
                                                    <option value="ليسوتو    "> ليسوتو </option>
                                                    <option value="ماكاو    "> ماكاو </option>
                                                    <option value="مالاوي    "> مالاوي </option>
                                                    <option value="مالطا    "> مالطا </option>
                                                    <option value="مالي    "> مالي </option>
                                                    <option value="ماليزيا    "> ماليزيا </option>
                                                    <option value="مايوت    "> مايوت </option>
                                                    <option value="مدغشقر    "> مدغشقر </option>
                                                    <option value="مدينة الفاتيكان    "> مدينة الفاتيكان </option>
                                                    <option value="مصر    "> مصر </option>
                                                    <option value="مقدونيا    "> مقدونيا </option>
                                                    <option value="منغوليا    "> منغوليا </option>
                                                    <option value="موريتانيا    "> موريتانيا </option>
                                                    <option value="موزامبيق    "> موزامبيق </option>
                                                    <option value="مولدافيا    "> مولدافيا </option>
                                                    <option value="موناكو    "> موناكو </option>
                                                    <option value="ميانمار    "> ميانمار </option>
                                                    <option value="ناميبيا    "> ناميبيا </option>
                                                    <option value="نيجيريا    "> نيجيريا </option>
                                                    <option value="نيكاراجوا    "> نيكاراجوا </option>
                                                    <option value="نيوزلتدا    "> نيوزلتدا </option>
                                                    <option value="نيوي    "> نيوي </option>
                                                    <option value="هايتي    "> هايتي </option>
                                                    <option value="هندوراس    "> هندوراس </option>
                                                    <option value="هولندا    "> هولندا </option>
                                                    <option value="هونغ كونغ    "> هونغ كونغ </option>
                                                </select>
                                                <input type="hidden" name="Date" value="<? echo(@$emaildate) ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer sender">
                                <div class="pull-right" style="float:left !important">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='التالي' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value="إرسال" />
                                </div>
                                <div class="pull-left" style="float:right !important">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='السابق' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div id="myModal1" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-paint-brush"></i> <span>مصمم</span></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $__env->make("fields", ["location"=>1], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="myModal2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-code"></i> <span>مكود</span></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $__env->make("fields", ["location"=>2], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="myModal3" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-database"></i> <span>مبرمج</span></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $__env->make("fields", ["location"=>3], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo e(asset("public/front/js/jquery-2.2.4.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/ajax.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/jquery.bootstrap.wizard.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/paper-bootstrap-wizard.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("public/front/js/jquery.validate.min.js")); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() {

        $(".choice").on("click", function (e) {
            e.preventDefault();
            var val = $(this).data("val");
            $("#location").val(val);
            $("#myModal"+val).modal("show")
        });


        // Selectors Vars
        var sender				= $(".sender"),
            result				= $(".result")

        // Fading Time
        var fadingTime			= 1000,
            resultShowTime		= 3000;

        // Send Mail with Ajax
        $('#Form').submit( function(e) {
            e.preventDefault();
            if($("#location").val()==0){
                alert("يجب إختيار التخصص !");
                return;
            }
            var loc = $("#location").val();

            var close=true;
            $('#myModal'+loc+' .form-control[required]').each(function () {
                if(!this.value || this.value=="")
                    close = false;
            });

            if(close==false){
                alert("يجب تعبئة جميع بيانات التخصص !");
                $("#myModal"+loc).modal("show");
                return false;
            }

            var data = new FormData(this);
            $.ajax({
                url: uurl,
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.sender').hide(1000);
                    $('#loader').fadeIn(1000);

                },
                complete: function(){
                    $('#loader').hide();
                },
                success: function(data){
                    sender.fadeOut(fadingTime, function(){
                        result.fadeIn(fadingTime, function() {
                            $(this).delay(resultShowTime).fadeOut(fadingTime, function(){
                                sender.fadeIn();
                            });
                        });
                    });

                },
                error: function(){

                }
            });
        });

    });

    $(function(){
        $(".btn-finish").click(function(){
            document.getElementById("wid").style.width = "100%";
        });
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>

    (function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2&&jQuery.fn.select2.amd)var e=jQuery.fn.select2.amd;return e.define("select2/i18n/ar",[],function(){return{errorLoading:function(){return"لا يمكن تحميل النتائج"},inputTooLong:function(e){var t=e.input.length-e.maximum;return"الرجاء حذف "+t+" عناصر"},inputTooShort:function(e){var t=e.minimum-e.input.length;return"الرجاء إضافة "+t+" عناصر"},loadingMore:function(){return"جاري تحميل نتائج إضافية..."},maximumSelected:function(e){return"تستطيع إختيار "+e.maximum+" بنود فقط"},noResults:function(){return"لم يتم العثور على أي نتائج"},searching:function(){return"جاري البحث…"}}}),{define:e.define,require:e.require}})();

    $(function () {

        $('.datepicker').datepicker({format: 'yyyy-mm-dd', rtl: true, language: 'ar'});

        $(".timepicker").timepicker({ showMeridian:false, icons:{up: 'fa fa-chevron-up', down: 'fa fa-chevron-down'}});

        $(".select2x").select2({dir: "rtl", language: "ar"});

    });
</script>

<style>
    span.red{
        color: crimson;
    }
    .modal .form-control{
        border-radius: 0px;
    }
    .modal .input-group-addon{
        border-left: 1px solid #e8e7e3 !important;
        border-radius: 0px;
    }
    .modal .input-group .form-control{
        border-right: 1px solid #e8e7e3 !important;
        border-left: none !important;
        border-radius: 0px;
    }
    .datepicker{
        text-align: right;
    }
    .bootstrap-timepicker-widget{
        direction: ltr !important;
        right: auto !important;
    }
    .select2-selection{
        padding: 1px !important;
        border-color: #eee;
    }
    .select2-container, .selection, .select2-selection {
        display: block;
        width: 100% !important;
    }
    .select2-selection{
        border-radius: 0px !important;
        padding: 3px !important;
        background: #F3F2EE !important;
        border: 1px solid #e8e7e3 !important;
    }
    .select2-container .select2-selection--single {
        height: 35px!important;
    }
    .modal-backdrop{
        display: none;
    }
    .modal-header, .modal-body, .modal-footer{
        padding: 10px 15px;
    }
    .form-group {
        margin-bottom: 10px;
    }
</style>

</html>
