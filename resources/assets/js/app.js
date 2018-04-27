
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
window.alertify = require('alertifyjs')
window.select2 = require('select2')
window.datepicker = require('bootstrap-datepicker')
window.vuelidate = require('vuelidate')
window.moment = require('moment')

window.Vue.use(window.vuelidate.default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let path = document.head.querySelector('meta[name="path"]').content

switch (path) {
  case String(path.match(/login/)):
    require('./pages/login')
    break

  case String(path.match(/admin\/category/)):
    require('./pages/admin/category')
    break

  case String(path.match(/admin\/category\/create/)):
  case String(path.match(/admin\/category\/\d\/edit/)):
    require('./pages/admin/category-create')
    break

  case String(path.match(/admin\/user/)):
    require('./pages/admin/user')
    break

  case String(path.match(/admin\/user\/create/)):
  case String(path.match(/admin\/user\/\d\/edit/)):
    require('./pages/admin/user-create')
    break

  case String(path.match(/admin\/job/)):
    require('./pages/admin/job')
    break

  case String(path.match(/admin\/job\/create/)):
  case String(path.match(/admin\/job\/\d\/edit/)):
    require('./pages/admin/job-create')
    break

  case String(path.match(/admin\/test/)):
    require('./pages/test/ntt')
    break
}
