$(document).ready(function() {
	change();
	clickAnimation();
	handleClick();
});

function updateTime() {
	setInterval(function() {
		var time = $('#click-time');
		var val = parseInt(time.html());
		time.html(val -= 1);
	}, 1000);
}

function handleClick() {
	var count = 0;
	$(".click-circle").click(function() {
		if(count == 0) {
			setTimeout("finish()", 30000);
			updateTime();
		}
		count++;
		change();
		$("#click-count").html(count);
		$('.total').css('color', '#00E971');
		setInterval(function() {
			$('.total').css('color', '#FFF');
			clearInterval(this);
		}, 750);
	});
}

function change() {
	var circle = $(".click-circle");
	var x = (Math.random() * ($(document).width() - 55)).toFixed();
	var y = (Math.random() * ($(document).height() - 55)).toFixed();
	circle.css({
		'left':x+'px',
		'top':y+'px'
	});
}

function finish() {
	$.get('lib/record-data.php', { amt: parseInt($("#click-count").html()) } );
	$(".click-circle").animate({
		'left':'-100px'
	}, 1000);
	$(".total").animate({
		'top':'42%',
		'left':'47%',
	}, 1000);
	$('.time').animate({
		'left':'-100px'
	}, 1000);
	$('.stats').fadeIn('slow');
}

function clickAnimation() {
	$('html').click(function(e) {
    	$('.click-animation').addClass('active').css({'left' : e.pageX, 'top' : e.pageY});
    });
	$('.click-animation').bind('transitionend', function() {
		$(this).removeClass('active');
	});	
}