<template>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"> <i class="fas fa-clinic-medical"></i> </span>
  </div>
      <input type="text" class="form-control" v-bind:placeholder="orgSearch" v-bind:aria-label="orgSearch" aria-describedby="basic-addon1">
  <div class="input-group-append" v-on:click="searchOrg">
	<span class="input-group-text"> <i class="fas fa-search"></i> </span>
  </div>
</div>  
   
</template>


<script>
export default{
data () {
  return {
      orgs: [],
      fios:[],
      orgSearch: 'Учреждение',
      fioSearch: ''
    }
},
methods: {
    searchOrg: function(){
      let data = {};
      data.org = 'org';

      axios.post('/records', data)
      .then(function (response) {
        console.log(response.data);
        this.orgs = response.data;
        console.log(this.orgs);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
    }
}
</script>


<style>

</style>