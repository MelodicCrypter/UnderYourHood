//If refreshed, set to 0
//So that the top will always be shown first
window.onbeforeunload = function(){
	window.scrollTo(0,0);
}

$(function(){  // $(document).ready shorthand
    
    setTimeout(function() {
        $("#splash").fadeOut(100);
        $("#splash").remove();
    }, 3000);
    
    $('#pointedMenu').on('click',function()
    {
        // hide mobile menu 
        if($(this).attr('data-click-state') == 1) 
        {
            $("nav").fadeOut(100);
            $(this).attr('data-click-state', 0)
        } 
        else 
        {
            // show mobile menu
            $(this).attr('data-click-state', 1)
            $("nav").fadeIn(100);
        }

    }); 
    
    /*$("#announcement").show(2000);
    $("#closeAnnouncement").fadeIn(7000);
    $("#opacityBackgroundAnnouncement").css({"opacity": ".8"}).fadeIn(3700);
    $("#closeAnnouncement").click(function (e) 
    {   
        e.preventDefault();
        $('#announcement').fadeOut(100);
        $('#closeAnnouncement').fadeOut(100);
        $("#opacityBackgroundAnnouncement").fadeOut(100).css({"opacity": "0"});
        $('#greenArrow').fadeIn(100);
    }); */
    
    $("#greenArrow").click(function (e) 
    {   
        e.preventDefault();
        $('#developerBackground').fadeIn(100);
        $('#developerInfo').fadeIn(100);
        $('#developerClose').fadeIn(100);
    });
    
    $("#developerClose").click(function (e) 
    {   
        e.preventDefault();
        $('#developerBackground').fadeOut(100);
        $('#developerInfo').fadeOut(100);
        $('#developerClose').fadeOut(100);
    });
    
});

