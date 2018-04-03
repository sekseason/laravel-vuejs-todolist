const { required, email, minLength } = require('vuelidate/lib/validators')

new window.Vue({ // eslint-disable-line no-new
  el: '.login-page',
  data () {
    return {
      email: '',
      password: ''
    }
  },
  validations: {
    email: {
      required,
      email
    },
    password: {
      required,
      minLength: minLength(4)
    }
  }
})
