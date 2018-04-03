const { required, minLength } = require('vuelidate/lib/validators')

new window.Vue({ // eslint-disable-line no-new
  el: '.admin-job-create',
  data () {
    return {
      title: '',
      description: '',
      category: '',
      assignTo: '',
      startDate: '',
      endDate: '',
      file: '',
      link: ''
    }
  },
  validations: {
    title: {
      required,
      minLength: minLength(4)
    },
    description: {
      required,
      minLength: minLength(4)
    },
    category: {
      required
    },
    assignTo: {
      required
    },
    startDate: {
      required
    },
    endDate: {
      required
    }
  },
  mounted () {
    this.init()
  },
  methods: {
    init () {
      let select2 = $('.select2')

      select2.select2()
      select2.on('change', () => {
        this.assignTo = $('.select2 option:selected').val()
      })

      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '1d'
      }).on('changeDate', (e) => {
        let el = $(e.target).closest('input')

        if (!el.length) {
          el = $(e.target).children('input')
        }

        if (typeof el.attr('name') !== 'undefined') {
          this[el.attr('name')] = el.val()
        }
      })
    }
  }
})
