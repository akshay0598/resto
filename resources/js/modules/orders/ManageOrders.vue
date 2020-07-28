<template>
    <table class="table table-striped table-hover table-bordered float-right" style="margin:10px;float:right">
    <thead>
    </tr>
    <th>Order Id</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Customer Details</th>
    <th>Actions</th>
    </tr>
    </thead>
    <order-items :orders = "orders.data" @onComplete="handleComplete" @onDelete="handleDelete"></order-items>
    </table>
</template>

<script>
import axios from 'axios';
import OrderItems from './../../components/OrderItems.vue';
export default{

props:['orders'],
data(){
return{
localOrders:null
}
},
created(){
this.localOrders=this.orders;
},
components:{
OrderItems
},
methods:{
handleComplete(order){
if(!confirm("Are you sure your order is complete?")){
return;
}
const postData ={order_id:order.id};
window.axios.post('/api/order/complete',postData).then(response => {
this.localOrders.data.forEach((order,index) => {
if(order.id === response.data.id){
this.localOrders.data[index].isComplete = 1;
}
});
});
},
handleDelete(order){
if(!confirm("Are you sure you want your order to be deleted?")){
return;
}
const postData ={order_id:order.id};
window.axios.post('/api/order/remove',postData).then(response => {
this.localOrders.data = this.localOrders.data.filter(localOrder => {
return localOrder.id !== order.id;
});
});
}
}
}
</script>
