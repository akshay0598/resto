<template>
<div class="container">
<form v-on:submit.prevent="handleRequest">
<div class = "form-group">
<label for="name">Food Item</label>
<input type="text" placeholder="Enter a food item" class="form-control" name="item" v-model="food.item"/>
<div class="validation-message" v-text="validation.getMessages('item')" style="color:red"></div>
</div>


<div class="form-group">
<label for="name">Select Category</label>
<multiselect
:options="categories" v-model="food.category"></multiselect>
<div class="validation-message" v-text="validation.getMessages('category')" style="color:red"></div>
</div>
<div class="form-group">
<label for="name">Price</label>
<input type="number" placeholder="Enter food price" v-model="food.price" class="form-control"/>
<div class="validation-message" v-text="validation.getMessages('price')" style="color:red"></div>
</div>
<div class="form-group">
<label for="name">Description</label>
<textarea placeholder="Enter food description" v-model="food.description" class="form-control"></textarea>
<div class="validation-message" v-text="validation.getMessages('description')" style="color:red"></div>
</div>
<div class="form-group">
<button class="btn btn-primary">Save</button>
</div>
</form>
</div>
</template>
<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../utils/Validation.js';
export default{
props:['categories','restoId'],
data()
{
return{
food:{
item:'',
category:'',
description:'',
price:100
},
validation:new Validation()

}
},
components:{
Multiselect
},

methods:{
handleRequest(){
console.log('form-data',this.food);
let postData = this.food;
postData.restoId=this.restoId;
window.axios.post('api/item/save',postData).then(response =>{
console.log('response',response.data);
}).catch(error => {
console.log('error',error.response);
if(error.response.status==422){
this.validation.setMessages(error.response.data.errors);
}
});
}
}

}
</script>
