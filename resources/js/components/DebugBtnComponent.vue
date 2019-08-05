<template>
<div id="dbg-btn" class="btn btn-primary" v-on:click="dbgBtnHandler">Send</div>
</template>


<script>
export default{
data () {
  return {
      userData: "Талон № С20190201-387085 ГБУЗ ГП № 23 ДЗМ филиал № 5 15 Февраля 2019, Пт, 11:36 Врач-офтальмолог Яровкина Лариса Юрьевна 439 каб"
    }
},
methods: {
    dbgBtnHandler: function(){
      let data = {};
      data.userData = this.userData;
         
      axios.post('/quiz', data)
      .then(function (response) {
        document.write(response.data);
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