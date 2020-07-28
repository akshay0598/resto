require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal';
import Vue from 'vue';
import MenuContainer from './modules/menu/MenuContainer.vue';
import CardContainer from './components/Card.vue';
import RestoGroup from './modules/restos/RestoGroup';
import OrderGroup from './modules/orders/OrderGroup.vue';
import ManageOrders from './modules/orders/ManageOrders.vue';

import Turbolinks from 'turbolinks';

import TurbolinksAdaptar from 'vue-turbolinks';


Turbolinks.start();

Vue.component('menu-container',MenuContainer);
Vue.component('card-container',CardContainer);
Vue.component('resto-group',RestoGroup);
Vue.component('order-group',OrderGroup);
Vue.component('manage-orders',ManageOrders);



Vue.use(VModal);
window.eventBus = new Vue({});


document.addEventListener('turbolinks:load', () => {
var element = document.getElementById("app");
if(element != null){
const app=new Vue({
el: element,
components:
{MenuContainer,CardContainer,RestoGroup,OrderGroup,ManageOrders
    }

});
}

});


