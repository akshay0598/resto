require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal';
import Vue from 'vue';
import MenuContainer from './modules/menu/MenuContainer.vue';
import CardContainer from './components/Card.vue';
import RestoGroup from './modules/restos/RestoGroup';
import Turbolinks from 'turbolinks';

import TurbolinksAdaptar from 'vue-turbolinks';


Turbolinks.start();

Vue.component('menu-container',MenuContainer);
Vue.component('card-container',CardContainer);
Vue.component('resto-group',RestoGroup);
Vue.use(VModal);


document.addEventListener('turbolinks:load', () => {
var element = document.getElementById("app");
if(element != null){
const app=new Vue({
el: element,
components:
{MenuContainer,CardContainer,RestoGroup
    }

});
}

});


