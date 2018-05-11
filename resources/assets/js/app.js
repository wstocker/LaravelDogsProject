
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('dog-form-component', require('./components/DogFormComponent.vue'));
//Vue.component('login-form-component', require('./components/LoginFormComponent.vue'));

const app = new Vue({
    el: '#app',
     data:{
        user:{
            email: '',
            Password: ''
        },
    },
    methods:{
       addUser: function(){ 
          axios.post('/login', { email: this.user.email, password: this.user.password })
          .then(function (resp) {
             alert('Hello ' + resp.data + ' You have logged in!');
             })
             .catch(function (resp) {
                alert("Could not login! Try again!");
             });
         } 
    }
});
