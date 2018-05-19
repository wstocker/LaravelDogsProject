<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Please Submit the Dog's Name:</div>
                    <div class="card-body" id="app">
                       <form v-on:submit.prevent="addDog">
                         Dog's Name:
                         <input type="text" v-model="dog_name">
                         <input type="hidden" name="_token" :value="csrf">
                         <button>Submit</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data () {
      return {
        dog_name: '',
          csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
         };
      },
      mounted() {
        console.log('Component Mounted')
      },
      methods: {
        async addDog() {
           if(this.dog_name.length === 0) alert("Dog name can't be empty!"); return;
           let post = await axios.post('/dogs', { dog_name: this.dog_name });
           if(!post) alert("Could not add new dog! Try again!"); return;
           alert("New dog has been added!");
         }
      }
   }
</script>