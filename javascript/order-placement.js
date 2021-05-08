window.onload = function() {
	// Nike
	const nikeQuantity = document.getElementById('nike_quantity_value');
	const nikeTotalPrice = document.getElementById('nike_total_price');
	const nikePrice = 50000000;
	nikeQuantity.addEventListener('input', (evt) => updatePrice(nikePrice, nikeTotalPrice, evt));

	// Burbery
	const burberyQuantity = document.getElementById('burbery_quantity_value');
	const burberyTotalPrice = document.getElementById('burbery_total_price');
	const burberyPrice = 23800000;
	burberyQuantity.addEventListener('input', (evt) => updatePrice(burberyPrice, burberyTotalPrice, evt));

	// Coupon
	const coupon = document.getElementById('coupon');
	const couponError = document.getElementById('coupon_error');
	const coupon20Percent = "COSC2430-HD"
	const coupon10Percent = "COSC2430-DI"
	coupon.addEventListener('input', (evt) => checkCoupon(coupon, evt));


	// Total
	const totalQuantity = document.getElementById('total_quantity');
	const totalPrice = document.getElementById('total_price');
	let totalValue = 73800000;

	function updatePrice(price, element, evt) {
	  element.textContent = formatCurrency(price * evt.target.value);
	  totalValue = (nikeQuantity.value * nikePrice) + (burberyQuantity.value * burberyPrice);
	  totalPrice.textContent = formatCurrency(totalValue);
	  totalQuantity.textContent = parseInt(nikeQuantity.value) + parseInt(burberyQuantity.value);
	  checkCoupon(coupon, evt);
	}

	function formatCurrency(value) {
		return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
	}

	function percentage(percent, total) {
    	return ((percent/ 100) * total).toFixed(2);
	}

	function checkCoupon(coupon, evt) {
		if (coupon.value === "") {
			return;
		}

		if (coupon.value === coupon20Percent) {
			// 20% discount
			const discountTotal = percentage(20, totalValue);
			const newTotal = totalValue - discountTotal;
			totalPrice.textContent = formatCurrency(newTotal);
			couponError.textContent = "";
		} else if (coupon.value === coupon10Percent) {
			// 10% discount
			const discountTotal = percentage(10, totalValue);
			const newTotal = totalValue - discountTotal;
			totalPrice.textContent = formatCurrency(newTotal);
			couponError.textContent = "";
		} else {
			totalValue = (nikeQuantity.value * nikePrice) + (burberyQuantity.value * burberyPrice);
			totalPrice.textContent = formatCurrency(totalValue);

			couponError.textContent = "Wrong coupon code, please enter again."
		}
	}
}
