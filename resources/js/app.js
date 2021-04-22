
require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('lecturer-registration', require('./components/Index.vue').default);
Vue.component('basic-information', require('./components/BasicInformation.vue').default);
Vue.component('professional-information', require('./components/ProfessionalInformation.vue').default);
Vue.component('avatar', require('./components/Avatar.vue').default);


const app = new Vue({
    el: '#app',
});
