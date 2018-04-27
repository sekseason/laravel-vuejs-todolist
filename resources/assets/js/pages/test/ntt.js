const { required, minLength } = require('vuelidate/lib/validators')

new window.Vue({ // eslint-disable-line no-new
  el: '.test-ntt',
  data() {
    return {
      url: 'https://sandbox2.nttdpay.com/PaymentPages/PaymentRequestPayment2',
      request: {},
      response: {}
    }
  },
  mounted() {
    this.request = this.default()
  },
  methods: {
    default() {
      return {
        login: 'GENTOSIA',
        pass: 'Gentosia@123',
        amt: (Math.floor(Math.random() * 600) + 600),
        txncurr: 'CNY',
        txnid: (Math.floor(Math.random() * 90000) + 100000),
        date: (window.moment().format('YYYY-MM-DD HH:mm:ss')),
        ru: 'http://localhost/todo/test/ntt',
        od: 'Test Payment Request',
        remarks: ('Ref:' + Math.random().toString(36).substring(2, 18)),
        customername: 'Mr. Test',
        emailid: 'test@example.com',
        mobile: '0912345678',
        billingaddress: '123 Bangkok, Thailand 10000',
        signature: 'm74ba6ofz0oyvw6ktpwtrq2tvpptrfxj'
      }
    },
    reset() {
      this.request = this.default()
    },
    send() {
      window.alertify.confirm('Confirmation', 'Payment to:<br/>' + this.url + '<p>Data:</p><pre>' + (JSON.stringify(this.request)) + '</pre>', () => {
        window.axios.post(this.url, this.request)
          .then(res => {
            console.log(res)
          })
      }, null)
    }
  }
})
