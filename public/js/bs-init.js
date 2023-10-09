document.addEventListener('DOMContentLoaded', function() {

	var charts = document.querySelectorAll('[data-bss-chart]');

	for (var chart of charts) {
		chart.chart = new Chart(chart, JSON.parse(chart.dataset.bssChart));
	}
}, false);

document.getElementById("myAnchor").addEventListener("click", function(event){
	event.preventDefault()
	document.getElementById('fileImage').click();
});