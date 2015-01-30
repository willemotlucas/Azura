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

$(document).ready(function() {   
	console.log('ok');
    equalHeight($(".thumbnail")); 
});