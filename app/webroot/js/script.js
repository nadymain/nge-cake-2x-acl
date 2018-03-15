$(document).ready(function () {
	$('.navmenu_btn').click(function (e) {
		e.preventDefault();
		$('.navmenu_btn').toggleClass('active');
		$('.navmenu').toggleClass('show');
	});

	$('.dropit').dropit();

	$('.message, .error-message').slideDown('fast', function () {
		setTimeout(function () {
			$('.message, .error-message').slideUp('fast');
		}, 10000);
	});
	
	$('.message').on('click', function () {
		$('.message').slideUp('fast');
	});
});
