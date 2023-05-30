$(document).ready(function() {
    
    $('.language').on('click',function(){
        var languageName =  $(this).data("code");
        setCookie('language', languageName,  3);
        location.reload();
    });

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

});