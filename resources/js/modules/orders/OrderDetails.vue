<template>
<ul class="list-group">
<li class="list-group-item" v-for="(item,key) in orderDetails" :key="key">
{{ item.name }}<span class="float-right">{{ item.price }}
<button class="btn btn-warning float-right ml-3" @click="handleRemoveItem(item) ">Delete</button>
</span>
</li>
</ul>
</template>
<script>
export default{
props:['orderDetails'],
methods:{
handleRemoveItem(item){
window.eventBus.$emit('removeOrderItem',item);
}
}
}
</script>
