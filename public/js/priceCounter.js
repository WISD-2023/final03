$(function(){
	onCountTotal();
});

function onCountTotal(){
	let total = 0;
	$('table tbody td[data-price]').each(function(){
		let money = parseInt($(this).text().replaceAll('$',''));
		total+=money;
	});

	$('table tfoot th[data-total]').text('$'+total);
}
function onCartChange(element, flag){
	if(flag && !element.value || !element.value || element.value < 1){
		element.value = 1;
	}


	if(element.value && element.value > 0){
		$(element).parents('tr[data-id]').find('form.update input[name="amount"]').val(element.value);

		let $ele = $(element).parents('tr[data-id]').find('td[data-price]');
		$ele.text("$"+$ele.data('price')*element.value);

		onCountTotal();
	}
}