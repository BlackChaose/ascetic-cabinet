<template>
  <div>
      <autocomplete :search="search" :placeholder="phName" :aria-label="arName" :get-result-value="getResultValue" @submit="handleSubmit"></autocomplete>
      <input type="hidden" name="_token" :value="csrf">       
  </div>
</template>


<script>
import Autocomplete from '@trevoreyre/autocomplete-vue';
import _ from 'lodash';
import '@trevoreyre/autocomplete-vue/dist/style.css'

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
        const url_filter = `/filter_records/${this.typeSearch}/`;
        var data = {
        param: result,
        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      };

      return new Promise(resolve => {
          fetch(url_filter,{
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then(response => response.json())
          .then(data => {
                if(!isNaN(parseFloat(data.response.range))){
                  console.warn(data.response.range);

                  let obj_txt=document.createElement('span');
                  obj_txt.textContent='средняя оценка учреждения: ';
                  obj_txt.style.backgroundColor='cyan';

                  let obj_range=document.createElement('b');
                  obj_range.style.color='red';
                  obj_range.style.fontSize='larger';
                  obj_range.style.fontWeight='bolder';
                  obj_range.style.backgroundColor='yellow';
                  
                  obj_range.textContent=parseFloat(data.response.range).toFixed(2);

                  obj_txt.append(obj_range);
                  resolve(document.getElementById('charts_area1').append(obj_txt));
                  }
              })
      });

    }},
components: {
  Autocomplete
}
}

</script>


<style>
input.autocomplete-input{
 display: block;
 position: relative;
 max-height: 28px !important;
 max-width: 300px;
 border-radius: 4px !important;
 text-align: left;
} 
</style>