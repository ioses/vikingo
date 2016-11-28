/**
 * @author D681892
 */

$(document).ready(function() {
    
    $('#inicio').change(function(){
        $('#fin').attr('min', $('#inicio').val());      
    });
        
    
    $('#fin').change(function(){
        $('#inicio').attr('max', $('#fin').val());   
    });
    
});