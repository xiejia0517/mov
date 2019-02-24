
$(document).ready(function(){
    var sec = 15;
    $interval = setInterval(function(){
        
        $("#countDown_span").html(sec);
        sec -- ;
        if(sec == 0)
        {
            clearInterval($interval);
            $(".success_title").hide();
            $(".success_title_2").show();
        }
    },1000);
})
