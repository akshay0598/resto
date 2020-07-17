<template>
<div class="container">
<form v-on:submit.prevent="handleRequest">
<div class = "form-group">
<label for="name">Food Item</label>
<input type="text" placeholder="Enter a food item" class="form-control" v-model="food.item"/>
</div>

<div class="form-group">
<label for="name">Select Category</label>
<multiselect
:options="categories" v-model="food.category"></multiselect>
</div>
<div class="form-group">
<label for="name">Price</label>
<input type="number" placeholder="Enter food price" v-model="food.price" class="form-control"/>
</div>
<div class="form-group">
<button class="btn btn-primary">Save</button>
</div>
</form>
</div>
</template>
<script>
import Multiselect from 'vue-multiselect';
export default{
props:['categories'],
data()
{
return{
food:{
item:'',
category:'',
price:100
}
}
},
components:{
Multiselect
},

methods:{
handleRequest(){

}
}

}
</script>
