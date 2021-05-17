const header = document.querySelector('.navbar');
const colornav = document.querySelectorAll('link-text')
document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundImage = "linear-gradient(to right, #a8caba 0%, #5d4157 100%)";
		colornav.style.color = '#fff';
		document.getElementById("navbar").style.marginTop = "0";

	} else {
		header.style.backgroundColor = 'transparent';
		header.style.backgroundImage = 'none';

	}
});

$(document).ready(function () {
	// Add smooth scrolling to all links in navbar + footer link

	alert("hello");
	$(window).scroll(function () {
		$(".slideanim").each(function () {
			var pos = $(this).offset().top;

			var winTop = $(window).scrollTop();
			if (pos < winTop + 600) {
				$(this).addClass("slide");
			}
		});
	});
})