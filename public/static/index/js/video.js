$(document).ready(function(){

    $('#by').hover(function(){
        $(this).addClass('thumbnail-self');
    },function(){
        $(this).removeClass('thumbnail-self');
    }
    );
    $('#by1').hover(function(){
        $(this).addClass('thumbnail-self');
    },function(){
        $(this).removeClass('thumbnail-self');
    }
    );
    $('#by2').hover(function(){
        $(this).addClass('thumbnail-self');
    },function(){
        $(this).removeClass('thumbnail-self');
    }
    );
    $('#by3').hover(function(){
        $(this).addClass('thumbnail-self');
    },function(){
        $(this).removeClass('thumbnail-self');
    }
    );
    $("#windows_download").click(function (e) { 
        $("#windows_pop_info").show();
    });
    $("#windows_pop_close_info").click(function (e) { 
        $("#windows_pop_info").hide();
    });
    // 
    function MathRand()
    {
        var Num="";
        for(var i=0;i<6;i++)
        {
        Num+=Math.floor(Math.random()*10);
        }
        return Num;
    } 
    // 
    $("#pay_1").click(function (e) { 
        // $("#invoice").val(md5(time()));
        var test = $("#pro_1").html();
        var testt = $("#pro_1_money").html();
        $(".pro_1_amount").val(test);
        $(".pro_1_currency_code").val(testt);
        console.log($(".pro_1_amount").val());
        console.log($(".pro_1_currency_code").val());
        
        // console.log(test);
        // console.log(testt);
        
        var timestamp = Date.parse(new Date());

        console.log($("#invoice_1").val((timestamp+ MathRand())));
        
    });
    $("#pay_2").click(function (e) { 
        // $("#invoice").val(md5(time()));
        var test = $("#pro_2").html();
        var testt = $("#pro_2_money").html();
        $(".pro_2_amount").val(test);
        $(".pro_2_currency_code").val(testt);
        console.log($(".pro_2_amount").val());
        console.log($(".pro_2_currency_code").val());
        var timestamp = Date.parse(new Date());

        console.log($("#invoice_2").val((timestamp+ MathRand())));
        
    });
    $("#pay_3").click(function (e) { 
        // $("#invoice").val(md5(time()));
        var test = $("#pro_3").html();
        var testt = $("#pro_3_money").html();
        $(".pro_3_amount").val(test);
        $(".pro_3_currency_code").val(testt);
        console.log($(".pro_3_amount").val());
        console.log($(".pro_3_currency_code").val());
        var timestamp = Date.parse(new Date());

        console.log($("#invoice_3").val((timestamp+ MathRand())));
        
    });
    $("#pay_4").click(function (e) { 
        // $("#invoice").val(md5(time()));
        var test = $("#pro_4").html();
        var testt = $("#pro_4_money").html();
        $(".pro_4_amount").val(test);
        $(".pro_4_currency_code").val(testt);
        console.log($(".pro_4_amount").val());
        console.log($(".pro_4_currency_code").val());
        var timestamp = Date.parse(new Date());

        console.log($("#invoice_4").val((timestamp+ MathRand())));
        
    });
    

    $(".pay-button").click(function (e) { 
        $(".confirm-pay-bg").slideDown(0,function(){
            $(".spinner").stop();
            $("#pay_submit").stop();;
            $(".confirt-main").stop();
            $(".confirt-main").animate({
                height : 400,
            },500)
        });
        
    });
    $(".pay-button2").click(function (e) { 
        $(".confirm-pay-bg2").slideDown(0,function(){
            $(".spinner2").stop();
            $("#pay_submit2").stop();;
            $(".confirt-main2").stop();
            $(".confirt-main2").animate({
                height : 270,
            },1000)
        });
        
    });

    $("#getlicense").click(function (e) { 
        $(".confirm-pay-bg2").slideDown(0,function(){
            $(".confirt-main2").stop();
            $(".confirt-main2").animate({
                height : 270,
            },1000)
        });
        
    });
    // $("#sendMail").click(function (e) { 
    //     $(this).replaceWith("<span style='float-left' class='glyphicon glyphicon-ok'></span>");
    // });
    // $("#pay_submit").click(function (e) { 
    //     var email = $("#input_email").val();
    //     if(email!="")
    //     {
    //         if(email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
    //         {
    //             $(this).hide();
    //             $(".spinner").show().delay(5000,function(){
    //                 $(".confirt-main").animate({
    //                     height : 0,
    //                 },500).delay(50000,function()
    //                 {
    //                     $("#form1").submit();
                        
    //                     $(".confirm-pay-bg").hide();
    //                     $(".spinner").hide()
    //                     $("#pay_submit").show();
    //                 })
    //             });
    //         }
    //         else
    //         {
    //             alert("格式不正确！请重新输入");
    //             $("#input_email").focus();
    //         }

            
    //     }
    // });
    
    $("#pay_submit2").click(function (e) { 
        var email = $("#input_email2").val();
        if(email!="")
        {
            if(email.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
            {
                $(this).hide();
                $(".spinner2").show().delay(5000,function(){
                    $(".confirt-main2").animate({
                        height : 0,
                    },500).delay(50000,function()
                    {
                        $("#form2").submit();
                        
                        $(".confirm-pay-bg2").hide();
                        $(".spinner2").hide()
                        $("#pay_submit2").show();
                    })
                });
            }
            else
            {
                $("#email_wrong_info").show();
                $("#input_email2").focus();
            }

            
        }
    });
    // $('.disabled').click(function(){
    //     return false;
    // });

    // $(Window).scroll(function(){
    //     $('.panel').each(function(){
    //         st=$(Window).scrollTop();
    //         pt=$(this).offset().top;
    //         if(st>=pt)
    //         {
    //             idx=$(this).attr('idx');
    //             $('#'+idx).addClass('active');
    //             $('.list-group-item').not($('#'+idx)).removeClass('active');
    //         }
    //     });
    // });
    $("#close_pop_window2").click(function (e) { 
        $(".confirt-main2").stop();
        $(".confirm-pay-bg2").stop();
        $(".confirm-pay-bg2").hide();
        $(".confirt-main2").animate({
            height : 0,
        },500)
       
    });
    $("#pay_close").click(function (e) { 
        $(".confirt-main2").stop();
        $(".confirm-pay-bg2").stop();
        $(".confirm-pay-bg2").hide();
        $(".confirt-main2").animate({
            height : 0,
        },500)
       
    });
    $("#close_pop_window").click(function (e) { 
        $(".confirm-pay-bg").hide();
    });
    $("#close_info").click(function (e) { 
        $("#email_wrong_info").hide();
    });
})