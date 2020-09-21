
function stickyTableUyarla(){
	var tmenu=$('.menu');
	var taltmenu=$('.altMenu,.indirMenu');
	var thead=$('.sticky-table .sticky-thead');

	taltmenu.css({'top':tmenu.height()+'px'});
	thead.css({'top':(tmenu.height()+taltmenu.height())+'px'});
	$('.sticky-table').css({'margin-top':( tmenu.height()+thead.height()+taltmenu.height() )+'px',
		'border-left':'0',
	}).addClass("sticky-active");

	setTimeout(function(){
		$('.sticky-table tbody tr:first-child th').each(function(i,e){
			//alert($(this).outerWidth() +" "+$(this).width() );
			$('.sticky-table .sticky-thead tr:first-child th').eq(i).css({'font-size':'7px'}).outerWidth( $(this).outerWidth() );
		});
		$('.sticky-table tbody tr:eq(3) td').each(function(i,e){
			$('.sticky-table .sticky-thead tr th').eq(i+1).css({'font-size':'7px'}).outerWidth( $(this).outerWidth() );
		});
	},200);
}

window.onresize=stickyTableUyarla;
/*
$(document).ready(function(){

	var stickyTableUyarlaAnahtar=0;
    $(document).scroll(function(e){
        if(stickyTableUyarlaAnahtar==0){
            if($(this).scrollTop()>80){ 
                stickyTableUyarla();
            }
        }
    });
});
*/