	<script src="https://cms.mqoqowa.africa/js/hamburgermenu.js"></script>
	<script src="https://cms.mqoqowa.africa/js/openmodel.js"></script>
	<script src="https://cms.mqoqowa.africa/js/scrolltofix.js"></script>

	<script type="text/javascript">
		// register modal component
		Vue.component('modal', {
		  template: '#modal-template',
		  props: {
		    show: {
		      type: Boolean,
		      required: true,
		      twoWay: true    
		    }
		  }
		})

		// start app
		new Vue({
		  el: '#modal',
		  data: {
		    showModal: false
		  }
		})
	</script>
	
	<script>
		const comment = new Vue({
			el: '#comment',
		  data: {
		   	comments: {},
		    commentBox: '',
		    new: {!! $content->toJson() !!},
		    user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
		  },
		  mounted() {
		    this.getComments();
		  },
		  methods: {
		    getComments() {
		      axios.get('/news/'+this.news.id+'/comments')
		      .then((response) => {
		       	this.comments = response.data
		      })
		      .catch(function (error) {
		       	console.log(error);
		      });
		    },
		    postComment() {
		      axios.news('/news/'+this.news.id+'/comment', {
		       	remember_token: this.user.remember_token,
		        body: this.commentBox
		     	})
		     	.then((response) => {
		      	this.comments.unshift(response.data);
		        this.commentBox = '';
		      })
		      .catch((error) => {
		        console.log(error);
		      })
		    }
		  }
		});
	</script>
