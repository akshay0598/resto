<template>
<div class ="container">
<div class="row">
<div class="col-md-4 mb-4" v-for="resto in restos" :key="resto.id">
<card-container>
<template slot="title">{{resto.name}}</template>
<template slot="body">{{resto.location}}</template>
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
export default{
props:['restos'],
components:{
RestoAddForm
},
computed:
{
showAddForm()
{
return (this.restos.length < 5 )? true : false;

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
}
}

}

</script>
