
	<script src="{{ url('js/app.js') }}"></script>

	<script>
		// Get the modal
		var modal = document.getElementById('myModal');
		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("modal-conten-close")[0];
		// When the user clicks the button, open the modal 
		btn.onclick = function() { modal.style.display = "block"; }
		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { modal.style.display = "none"; }
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) { modal.style.display = "none"; }
		}
	</script>

	<script src="{{ url('js/realtime.js') }}"></script>

	<script src="{{ url('js/african.js') }}"></script>
	<script src="{{ url('js/chart-afr.js') }}"></script>
	<script src="{{ url('js/chart-ao.js') }}"></script>
	<script src="{{ url('js/chart-bw.js') }}"></script>
	<script src="{{ url('js/chart-map.js') }}"></script>
	<script src="{{ url('js/chart-ke.js') }}"></script>
	<script src="{{ url('js/chart-mz.js') }}"></script>
	<script src="{{ url('js/chart-na.js') }}"></script>
	<script src="{{ url('js/chart-tz.js') }}"></script>
	<script src="{{ url('js/chart-za.js') }}"></script>
	<script src="{{ url('js/chart-zm.js') }}"></script>
	<script src="{{ url('js/chart-zw.js') }}"></script>
	
