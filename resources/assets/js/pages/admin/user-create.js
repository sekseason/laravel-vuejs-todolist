const { required, email, minLength } = require('vuelidate/lib/validators')

new window.Vue({ // eslint-disable-line no-new
  el: '.admin-user-create',
  data () {
    return {
      name: (window.form && window.form.hasOwnProperty('name') ? window.form.name : ''),
      email: (window.form && window.form.hasOwnProperty('email') ? window.form.email : ''),
      password: (window.form && window.form.hasOwnProperty('password') ? window.form.password : ''),
      role: (window.form && window.form.hasOwnProperty('role') ? window.form.role : '')
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    email: {
      required,
      email
    },
    password: {
      required
    },
    role: {
      required
    }
  },
  methods: {
    edit (el) {
      let form = $(el.target).closest('form')

      window.alertify.confirm('แก้ไขผู้ใช้งาน', 'ต้องการแก้ไขผู้ใช้งาน?', () => {
        form.submit()
      }, null)
    }
  }
})
