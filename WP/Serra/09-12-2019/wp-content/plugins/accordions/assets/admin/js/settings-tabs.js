jQuery(document).ready(function($){



	$(document).on('click','.settings-tabs .tab-nav',function(){

		$(this).parent().parent().children('.tab-navs').children('.tab-nav').removeClass('active');

        $(this).addClass('active');

        id = $(this).attr('data-id');

		//console.log('Hello click');
        console.log(id);

        $(this).parent().parent().children('.tab-content').removeClass('active');

        $(this).parent().parent().children('.tab-content#'+id).addClass('active');


	})




    $(document).on('click', '.settings-tabs .expandable .expand', function(){
        if($(this).parent().parent().hasClass('active'))
        {
            $(this).parent().parent().removeClass('active');
        }
        else
        {
            $(this).parent().parent().addClass('active');
        }


    })




    $(document).on('click', '.settings-tabs .remove', function(){

        var is_confirm = $(this).attr('confirm');

        if(is_confirm=='yes'){
            $(this).parent().parent().remove();
        }
        else{

            $(this).html('<i class="fas fa-trash-alt"></i>');
            $(this).attr('confirm','yes');

        }


    })
	
 		

});