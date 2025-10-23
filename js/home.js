// Accordion
var accItem = document.getElementsByClassName('accordionItem');
var accHD = document.getElementsByClassName('accordionItemHeading');
for (i = 0; i < accHD.length; i++) {
	accHD[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
	var itemClass = this.parentNode.className;
	for (i = 0; i < accItem.length; i++) {
		accItem[i].className = 'accordionItem close';
	}
	if (itemClass == 'accordionItem close') {
		this.parentNode.className = 'accordionItem open';
	}
}

$(document).ready(function(){
	$('.sliderMiddle').slick({
		 infinite: true,
		 dots: false,
		 speed: 300
	});
	$('.slick_mobile').slick({
		dots: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		centerMode: true,
		swipeToSlide: true,
		prevArrow: $('.prev'),
		nextArrow: $('.next')
	});
	$('.sliderProduct').slick({
		 dots: true,
		 infinite: true,
		 dots: false,
		 speed: 300,
		 slidesToShow: 4,
		 slidesToScroll: 4,
		  responsive: [
			{
			breakpoint: 1025,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 979,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				arrows: false
			}
			},
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false
			}
			}
		]
	});
});