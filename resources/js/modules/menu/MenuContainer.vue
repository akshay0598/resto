<template>
<div class="container">

<div class="row">
<div class="col-md-8">
<card-container>
<template slot="title">My Menu</template>
<template slot="body"><div class="section">
<multiselect :options="categories" v-model="menu"></multiselect>
</div>
<div class="section">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Name & Description</th>
<th>Price</th>

</tr>
</thead>
<tbody>
<tr v-for="(item,key) in menuItems" :key="key">
<td>
<strong >{{item.name}}</strong>
<p >{{item.description}}</p>
</td>
<td>
<span>{{item.price}}</span>
</td>
</tr>
</tbody>
</table>

</div>
</template>


</card-container>
</div>

<div clss="col-md-4">
<card-container>

<template slot="title">Add Menu Item</template>
<template slot="body">
<menu-add-form :categories="categories" :resto-id="restoId"></menu-add-form>
</template>
</card-container>
</div>

</div>
</div>
</template>


<script>
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import MenuAddForm from './MenuAddForm.vue';
export default
{
props:['items','restoId'],
components:
{
Multiselect,
'menu-add-form':MenuAddForm
},
created()
{
_.forEach(this.items, (item,key) =>{

this.categories.push(key);


});
this.menu=this.categories[0];
},
data(){
return{
categories:[],
menu:''
}
},
computed:
{
menuItems()
{
return this.items[this.menu];
}
}



}



</script>
