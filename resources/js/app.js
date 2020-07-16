require('./bootstrap');
import Vue from 'vue';
import MenuContainer from './modules/menu/MenuContainer.vue';
Vue.component('menu-container',require('./modules/menu/MenuContainer.vue'));

const app=new Vue({

el:'#app',
components:
{MenuContainer}

});
