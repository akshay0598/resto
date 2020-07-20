<template>
<div class="container">
<div class="form-group">
<h3>Add a New Restaurant</h3>
<label for="name">Name</label>
<input type = "text" class="form-control" placeholder="Enter Restaurant Name" v-model="resto.name" name="name"/>
</div>
<div class="form-group">
<label for="address">Address</label>
<input type = "text" class="form-control" placeholder="Enter Restaurant Address" name="location" v-model="resto.location"/>
</div>
<div class="form-group">
<label for="tables">No of Tables</label>
<input type = "text" class="form-control" placeholder="Enter Number Of Tables" name="tables" v-model="resto.tables"/>
</div>
<button class = "btn btn-primary" @click="handleAddButton">Add</button>
<button class = "btn btn-warning" @click="handleCancelButton">Cancel</button>
</div>
</template>

<script>
import axios from  'axios';
export default{
data(){
return{
resto:this.basicResto()
}
},
methods:{
basicResto() {
return { name:"", location:"", tables:0 }
},
handleAddButton(){
 this.$emit('addNewResto',this.resto);

},
handleCancelButton(){
this.resto = this.basicResto();
this.$emit('modalCancel');

}
}


}
</script>
