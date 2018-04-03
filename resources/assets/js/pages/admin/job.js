new window.Vue({ // eslint-disable-line no-new
  el: '.admin-job',
  methods: {
    remove (el) {
      let form = $(el.target).closest('form')

      window.alertify.confirm('ลบข้อมูล!', 'คุณต้องการลบข้อมูล?', () => {
        form.submit()
      }, null)
    }
  }
})
