
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

//Vue.component('example', require('./components/Example.vue'));
Vue.component('creditos-tabla', require('./components/creditos/table.vue'));

const app = new Vue({
    el: '#app',
    mounted() {
    	this.obtener_creditos()
    },
    data: {
    	creditos: [],
    	credito: {}
    },
    methods: {
    	obtener_creditos() {
    		axios.get('creditos/create').then(response => this.creditos = response.data);
		},
		agregar_credito() {
			axios.post('creditos',this.credito).then(response => this.obtener_creditos());
		},
    }
});
