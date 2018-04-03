const { required, minLength } = require('vuelidate/lib/validators')

new window.Vue({ // eslint-disable-line no-new
  el: '.admin-category-create',
  data () {
    return {
      name: (window.form && window.form.hasOwnProperty('name') ? window.form.name : '')
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    }
  },
  methods: {
    edit (el) {
      let form = $(el.target).closest('form')

      window.alertify.confirm('แก้ไขประเภทงาน', 'ต้องการแก้ไขประเภทงาน?', () => {
        form.submit()
      }, null)
    }
  }
})
