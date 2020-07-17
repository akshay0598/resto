require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import Vue from 'vue';
import MenuContainer from './modules/menu/MenuContainer.vue';
import CardContainer from './components/Card.vue';

Vue.component('menu-container',MenuContainer);
Vue.component('card-container',CardContainer);


const app=new Vue({

el:'#app',
components:
{MenuContainer,CardContainer
    }

});
