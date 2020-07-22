<template>
<div class="wrapper">
<input type = "text" class="form-control" placeholder = "Search here...." v-model = "searchString" style="margin-bottom:10px">
</div>
</template>

<script>
export default{
props:['items'],
data(){
return{
searchString:''
}
},
computed:{
filteredList(){
return this.items.filter(item => {
return item.name.toLowerCase().includes(this.searchString.toLowerCase());
})
}
},
watch:{
searchString(value){
if(value != ''){
window.eventBus.$emit('filteredList',this.filteredList);
}
else{
window.eventBus.$emit('clearfilteredList');
}
}
}

}
</script>
