$(document).ready(function () {
    $('div.menu_class1').click(function () {
	$('ul.the_menu1').slideToggle('medium');
	$('ul.the_menu2').slideUp();
	$('ul.the_menu1').slideUp();
    });
});
$(document).ready(function () {
    $('div.menu_class2').click(function () {
	$('ul.the_menu2').slideToggle('medium');
	$('ul.the_menu1').slideUp();
	$('ul.the_menu3').slideUp();
    });
});
$(document).ready(function () {
    $('div.menu_class3').click(function () {
	$('ul.the_menu3').slideToggle('medium');
	$('ul.the_menu2').slideUp();
	$('ul.the_menu1').slideUp();
    });
});