
<script type="text/javascript">
	// register modal component
	export default {
	  template: '#modal-template',
	  props: {
	    show: {
	      type: Boolean,
	      required: true,
	      twoWay: true    
	    }
	  }
	}

	// start app
	new Vue({
	  el: '#app',
	  data: {
	    showModal: false
	  }
	})
</script>