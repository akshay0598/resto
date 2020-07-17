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
<template slot="body">My Menu body
</template>
</card-container>
</div>

</div>
</div>
</template>


<script>
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
export default
{
props:['items'],
components:
{
Multiselect
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
