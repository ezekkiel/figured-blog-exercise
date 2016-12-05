window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');

require('bootstrap-sass');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Blog.csrfToken);

    next();
});
