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
    <order-items :orders = "orders.data"></order-items>
    </table>
</template>

<script>
import OrderItems from './../../components/OrderItems.vue';
export default{
props:['orders'],
components:{
OrderItems
}
}
</script>
