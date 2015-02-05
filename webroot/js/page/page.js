/*
 * This function is used to fix the hight issue of the thumbnail widget
 * Thanks to this script, the entire thumbnails have the same height
 */

function equalHeight(group) {
    var tallest = 0;    
    group.each(function() {       
        var thisHeight = $(this).height();       
        if(thisHeight > tallest) {          
            tallest = thisHeight;       
        }    
    });    
    group.each(function() { $(this).height(tallest); });
}

function changeModalDialog() {
    var modalDialogs = $('#last-achievement img');
    
    if($(window).width() < 615)
    {
        //Desactivate the modal dialog
        modalDialogs.each(function() {
            $(this).attr("data-toggle", "#");
        });
    }
    else
    {
        modalDialogs.each(function() {
            $(this).attr("data-toggle", "modal");
        });
    }
}

$(document).ready(function() {
    equalHeight($(".thumbnail"));
    changeModalDialog();
    
    $(window).resize(function(){
        equalHeight($(".thumbnail"));
        changeModalDialog();
    });
});