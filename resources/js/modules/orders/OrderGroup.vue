<template>
<div class="row">
<div class="col-md-7">
<div class="mb-5">
<h3>Customer Details</h3>
<order-form></order-form>
</div>
<div class="mb-5">
<h3>Order Details  <span class="float-right" v-if="finalAmount > 0">{{  finalAmount }}</span></h3>
<order-details :order-details ="orderDetails"></order-details>
</div>
</div>
<div class="col-md-5">
<h3>Menu</h3>
<order-menuitem
:items="menuItems"
@menuItemAdded = "handleNewMenuItem" ></order-menuitem>
</div>

</div>
</template>

<script>
import OrderForm from './OrderForm';
import OrderMenuItems from './OrderMenuItems';
import OrderDetails from './OrderDetails';

import axios from 'axios';

export default{
data(){
return{
menuItems:[],
orderDetails:[]
}
},
props:['restoId'],
components:{
'order-form':OrderForm,
'order-menuitem':OrderMenuItems,
'order-details':OrderDetails
},
created(){
this.loadRestoMenuItems();
window.eventBus.$on('menuItemAdded',this.handleNewMenuItem);
},
computed:{
finalAmount(){
let price = 0;
this.orderDetails.forEach(order => {
price = price + parseInt(order.price);
});
return price;
}
},
methods:{
loadRestoMenuItems(){
let postData = {restoId:this.restoId};
window.axios.post('/api/resto/menu',postData)
.then(response => console.log('response',this.menuItems = response.data))
.catch(error => console.log('error',error.response));

},
handleNewMenuItem(item){
this.orderDetails.unshift(item);
}
}
}
</script>
