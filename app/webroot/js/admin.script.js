$(document).ready(function () {
	$('.dropit').dropit();

	$('.message, .error-message').delay(100).slideDown('fast', function () {
		setTimeout(function () {
			$('.message, .error-message').slideUp('fast');
		}, 10000);
	});
	$('.message').on('click', function () {
		$('.message').slideUp('fast');
	});

	$('.header_menu a').click(function (e) {
		e.preventDefault();
		$('.header_menu-a').toggleClass('show');
		if ($(window).outerWidth() <= 768) {
			$('body').toggleClass('aside-on');
			$('body').removeClass('aside-off');
			if ($('body').hasClass('aside-on')) {
				$('.aside').animate({
					'left': '0'
				}, 'fast')
			} else {
				$('.aside').animate({
					'left': '-10rem'
				}, 'fast', function () {
					$(this).removeAttr('style')
				})
			}
		} else {
			$('body').toggleClass('aside-off');
			$('body').removeClass('aside-on');
			if ($('body').hasClass('aside-off')) {
				$('.aside').animate({
					'left': '-10rem'
				}, 'fast');
				$('.main').animate({
					'margin-left': '0'
				}, 'fast')
			} else {
				$('.aside').animate({
					'left': '0'
				}, 'fast', function () {
					$(this).removeAttr('style')
				});
				$('.main').animate({
					'margin-left': '10rem'
				}, 'fast', function () {
					$(this).removeAttr('style')
				})
			}
		}
	});
});
