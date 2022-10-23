// $(window).load(function() {
// 	// Animate loader off screen
// 	$(".loader").fadeOut("slow");;
// });

let dataTiket = $(".ticketBox").data('id')


//Ticket count and price minus and plus
$('.btn-number').click(function(e){
    e.preventDefault();
    /* ticket count */
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
	/* ticket price */
	var ticket = $(this).parents('.ticketBox').data('id');
    let harga = ticket.price
	/* ticket type */
    let tipe = ticket.name
	/* ticket id */
    let ticketId = ticket.id
	var total;

    var currentVal = parseInt(input.val());
   
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
                    
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();

				console.log(input.val());
				total = harga * input.val();
				console.log(harga);
				activeTicket(this, input.val(), harga, total, tipe, ticketId);
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {
         
            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();

				console.log(input.val());
				total = harga * input.val();
				console.log(harga);
				activeTicket(this, input.val(), harga, total, tipe, ticketId);
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});


$('.input-number').change(function() {
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

function activeTicket(target, inputValue, harga, total, tipe, ticketId) {
	if(inputValue > 0) {
        $("#ticket").val(ticketId);
		$('#buyTicket .ticketBox').addClass('inActiveTicket');
		$(target).parents('.ticketBox').removeClass('inActiveTicket').addClass('activeTicket');
		$('.cart .btn').removeClass('disabled');
		$('.ticket-ticket-id').html(ticketId);
		$('.ticket-type').html(tipe);
		$('.ticket-count').html(inputValue);
		$('.ticket-amount').html(harga);
		$('.total-amount').html(total);
	} else {
		$('#buyTicket .ticketBox').removeClass('inActiveTicket');
		$(target).parents('.ticketBox').removeClass('activeTicket inActiveTicket');
		$('.cart .btn').addClass('disabled');
		$('.ticket-ticket-id').html('');
		$('.ticket-type').html('');
		$('.ticket-count').html(inputValue);
		$('.ticket-amount').html(harga);
		$('.total-amount').html(total);
	}
}