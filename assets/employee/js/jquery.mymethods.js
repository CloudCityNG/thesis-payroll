var globalx = [];
var _ids = [];
var globalkey;
!function($){
 	var id = null;
	var temp_id = null;
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	var testm = [];
	$('.delete').click(function(){
			$('#deleteLabel span').html($(this).attr('name'));
					temp_id = this.id;
					_id = temp_id.split('_');
					id = $(this).attr('data-index');
					$('#cancel').html('Cancel');

			});


	$('#stack1').on('hidden.bs.modal', function () {
		  	globalx = [];
	});

 	$('#yesDelete').click(function(){
 			var protocol = window.location.protocol;
			var host = window.location.host;
			var pathname = window.location.pathname.split('/');
			var fullpatch = protocol+"//"+host+"/"+pathname[1]+"/"+pathname[2]+"/api/action";
			var module = $('#module').val();
			
			/*if(globalx!=""){
				$.post(fullpatch,{_delete:true,row:globalx,key:globalkey,logmo:module},function(data){
					if(data>=1){
							$('#stack1').modal('hide');
							$('.deleteall').hide();
									$.each(_ids,function(index,value){
										$('#delete'+value).hide();
								});
						}
					});
			}else{*/

			$.post(fullpatch,{_delete:true,row:temp_id,key:id,logmo:module},function(data){
				if(data==1){
						$('#stack1').modal('hide');
						$('#delete_'+id).fadeOut();
						$('#success_modal').modal('show');
					}else{
						$('#result').fadeIn('slow').addClass('alert alert-error').html('Unable to Delete. This role was use by another user.').css({'margin-botton':'5px!important'});
					}
				});
			//}
			
			
 	});




 	if($('#calendar').length > 0){

 	var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
 	}
}(window.jQuery);
$(document).on("click", ".deleteall", function (event) {
     event.preventDefault();
     		var x;
		    var searchIDs = $("input.check:checkbox:checked").map(function(){
		        return this.value;
		    }).toArray();
		    var _IDs = $("input.check:checkbox:checked").map(function(){
		        return this.id;
		    }).toArray();
		    if(searchIDs!=""){
		    	globalx = JSON.stringify({data:searchIDs});
		    	globalkey = this.id;
		    	_ids = _IDs; 
				/*$.each(searchIDs,function(index, value){
					globalx += value;	
				});*/

				
			}
});


function print_data(){
 			var searchIDs = $("input.check:checkbox:checked").map(function(){
		        return this.value;
		    }).toArray();
		$('#xrole').printArea();
	return false;	
}
