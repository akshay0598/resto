<template>
<div class="section">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Name & Description</th>
<th>Price</th>

</tr>
</thead>
<tbody>
<tr v-for="(item,key) in items" :key="key">
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

<script>
export default{

props:['items']

}
</script>
