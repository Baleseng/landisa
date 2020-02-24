<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
      url : '{{URL::to("find")}}',
      data:{'input':$value},
      success:function(data){
        $('.search ul').html(data);
      }
    });
  })
</script>

<script>
  function submenuHamburger() {
    var x = document.getElementById("submenu-nav");
    if (x.className === "submenu-vertical") {
      x.className += " responsive";
    } else {
      x.className = "submenu-vertical";
    }
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	
<script src="https://cms.mqoqowa.africa/js/ckeditor/ckeditor.js"></script>
<script src="https://cms.mqoqowa.africa/js/ckeditor/samples/js/sample.js"></script>
<script type="text/javascript">
	Vue.component('ckeditor', {
  template: `<textarea :id="id" :value="value"></textarea>`,
  props: {
    value: { type: String},
    id: {
      type: String,
      default: 'editor'
    },
    height: {
      type: String,
      default: '250px',
    },
    toolbar: {
      type: Array,
      default: () => [
        ['Undo','Redo'],
        ['Bold','Italic','Strike','Underline'],
        ['NumberedList','BulletedList'],
        ['Cut','Copy','Paste'],
      ]
    },
    language: {
      type: String,
      default: 'en'
    },
    extraplugins: {
      type: String,
      default: ''
    }
      },
      beforeUpdate () {
    const ckeditorId = this.id
    if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
      CKEDITOR.instances[ckeditorId].setData(this.value)
    }
      },
      mounted () {
    const ckeditorId = this.id
    console.log(this.value)
    const ckeditorConfig = {
      toolbar: this.toolbar,
      language: this.language,
      height: this.height,
      extraPlugins: this.extraplugins
    }
    CKEDITOR.replace(ckeditorId, ckeditorConfig)
    CKEDITOR.instances[ckeditorId].setData(this.value)
    CKEDITOR.instances[ckeditorId].on('change', () => {
      let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
      if (ckeditorData !== this.value) {
        this.$emit('input', ckeditorData)
      }
    })
      },
      destroyed () {
    const ckeditorId = this.id
    if (CKEDITOR.instances[ckeditorId]) {
      CKEDITOR.instances[ckeditorId].destroy()
    }
  } 
});

new Vue({
  el: '#editor',
  data: {
    content: ''
  }
});
</script>

<script src="https://cms.mqoqowa.africa/js/scrolltofix.js"></script>
