<template>
<div class ="container">
<div class="row">
<div class="col-md-4 mb-4" v-for="resto in local" :key="resto.id">
<card-container>
<template slot="title">{{resto.name}}</template>
<template slot="body">{{resto.location}}
<br>
<a v-bind:href = "resto.slug" class="card-link">View Menu</a>
<a v-bind:href = "resto.ordersSlug" class="card-link">Orders</a>

</template>
</card-container>
</div>

<div class="col-md-4 mb-4" v-if="showAddForm">
<card-container>
<template slot="title">Add New Restaurant</template>
<template slot="body">
<span @click = "handleNewResto">+</span>
</template>
</card-container>

<modal name="add-new-resto" height="70%">
<RestoAddForm
@addNewResto="handleAddResto"
v-on:modalCancel="handleCancelResto"></RestoAddForm>
</modal>
</div>


</div>
</div>
</template>
<script>
import RestoAddForm from './RestoAddForm.vue';
import axios from  'axios';
export default{
created(){
this.local = this.restos;
},
data(){
return{

local:[]
}
},
props:['restos'],
components:{
RestoAddForm
},
computed:
{
showAddForm()
{
return (this.local.length < 5 )? true : false;

}
},
methods:{
handleNewResto(){
this.$modal.show('add-new-resto');
},
handleCancelResto(){

this.$modal.hide('add-new-resto');
},
handleAddResto(resto){
console.log('resto',resto);
window.axios.post('/api/resto',resto).then(response=>{
console.log('response',response.data);
this.local.unshift(response.data);
this.$modal.hide('add-new-resto');
}).catch(error => {
console.log('error',error.response);
});
}
}

}

</script>
