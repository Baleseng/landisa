<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              <div class="model-share-wrapper">
                
                <div class="share_article_user_img">
                  <img class="fa fa-user" src="http://99.81.243.9/images/profile/users/{{ Auth::user()->profileimg}}">
                </div>
                <div class="share_article_user_name">
                  <a href="">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                </div>

              </div>
              <span class="modal-default-button" @click="$emit('close')">
                <i class="fa fa-window-close"></i>
              </span>
            </slot>
          </div>

          <div class="modal-form-input">
            <slot name="input"></slot>
          </div>

          <div class="model-form-sticky">
            <slot name="sticky"></slot>
          </div>

          <div class="modal-form-textarea">
            <slot name="textarea"></slot>
          </div>

           <div class="modal-form-button">
            <slot name="button"></slot>
          </div>

        </div>
      </div>
    </div>
  </transition>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script src="https://cms.mqoqowa.africa/ckeditor/ckeditor.js"></script>
<script src="https://cms.mqoqowa.africa/ckeditor/samples/js/sample.js"></script>
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

<script src="https://cms.mqoqowa.africa/scrolltofix.js"></script>


