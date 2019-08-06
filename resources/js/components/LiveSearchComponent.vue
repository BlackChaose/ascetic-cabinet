<template>
  <div>
      <autocomplete :search="search" :placeholder="phName" :aria-label="arName" :get-result-value="getResultValue" @submit="handleSubmit"></autocomplete>
      <input type="hidden" name="_token" :value="csrf">       
  </div>
</template>


<script>
import Autocomplete from '@trevoreyre/autocomplete-vue';
import _ from 'lodash';

export default{
name: 'LiveSearchComponent',
props: ['typeSearch','phName', 'arName'],  
data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),        
methods: {
search(input) {
  console.log(this.typeSearch);
      const url = `/records/${this.typeSearch}`;
      var data = {
        searchtpl: `${input}`,
        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      };
      return new Promise(resolve => {
        if (input.length < 2) {
          return resolve([])
        }

        fetch(url,{
            method: 'POST', 
            body: JSON.stringify(data), 
            headers:{
              'Content-Type': 'application/json'
            }
          })
          .then(response => response.json())
          .then(data => {
               resolve(_.map(data.search, el => {console.warn(el.name_org); return el.name_org}))
          })

      })
    },
getResultValue(result) {
      return result;
    },
handleSubmit(result) {
      window.open('https://google.com/search?q='+result);
    }
    },
components: {
  Autocomplete
}
}


</script>


<style>

</style>