<template>
<div>
<div class = "row">
<div class="col-md-12">
<button class = "btn btn-success float-right" @click="handleOrderSave">Save</button>
</div>
</div>
<div class="row">
<div class="col-md-7">
<div class="mb-5">
<h3>Customer Details</h3>
<order-form @customerDetailsChanged="customerDetailsHandle"></order-form>
</div>
<div class="mb-5">
<h3>Order Details  <span class="float-right" v-if="finalAmount > 0">{{  finalAmount }}</span></h3>
<order-details :order-details ="orderDetails"></order-details>
</div>
</div>
<div class="col-md-5">
<h3>Menu Items</h3>
<order-menuitem
:items="menuItems"
@menuItemAdded = "handleNewMenuItem" ></order-menuitem>
</div>

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
orderDetails:[],
originalMenuItems:[],
customerDetails:[]
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
window.eventBus.$on('filteredList',this.handleFilteredList);
window.eventBus.$on('clearfilteredList',this.handleEmpty);
window.eventBus.$emit('customerDetailsChanged',this.customerDetailsHandle);
window.eventBus.$on('removeOrderItem',this.handleRemoveOrderedItem);

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
.then(response => console.log('response',this.menuItems = response.data,
this.originalMenuItems=response.data))
.catch(error => console.log('error',error.response));

},
handleRemoveOrderedItem(item){
this.orderDetails=this.orderDetails.filter(orderItem => orderItem.id !=item.id);


},
handleNewMenuItem(item){
this.orderDetails.unshift(item);
},
handleFilteredList(filteredList){
this.menuItems = filteredList;
},
handleEmpty(){
this.menuItems = this.originalMenuItems;
},
customerDetailsHandle(customer){
console.log('customer',customer);
this.customerDetails = customer;
},
handleOrderSave(){
let orderItemsId = [];
this.orderDetails.forEach(item => {
orderItemsId.push(item.id);
});
let orderData = {
resto_id:this.restoId,
order_data:{
customerDetails:this.customerDetails,
totalPrice : this.finalAmount,
orderedItems:orderItemsId
}
};
console.log(orderData);
window.axios.post('/api/order/save',orderData).then(response =>
console.log('response',response.data));
}
}
}
</script>
