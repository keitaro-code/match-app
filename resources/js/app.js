import './bootstrap';
import * as Vue from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

window.Vue = Vue;
document.querySelectorAll('#app example-component').forEach(element => {
    Vue.createApp(ExampleComponent).mount(element);
});
