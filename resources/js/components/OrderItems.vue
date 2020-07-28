<template>
 <tbody>
    <tr v-for="order in orders" :key="order.id">
    <td>{{order.id}}</td>
    <td>{{order.amount}}</td>
    <td>{{order.isComplete?'Completed':'Incomplete'}}</td>
    <td>
    Name:{{order.order_details.customer_name}}<br>
    Phone:{{order.order_details.customer_phone}}<br>
    Address:{{order.order_details.customer_address}}<br>


    </td>
    <td><button class = "btn btn-success" @click="clickComplete(order)">Completed</button>
    <button class = "btn btn-danger ml-3" @click="clickDelete(order)" >Cancel</button></td>

    </tr>
    </tbody>
</template>

<script>
export default{
props:['orders'],
methods:{
clickComplete(order){
this.$emit("onComplete",order);
},
clickDelete(order){
this.$emit("onDelete",order);
}
}
}
</script>
