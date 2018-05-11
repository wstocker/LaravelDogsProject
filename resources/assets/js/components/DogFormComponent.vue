<template>
    <div class="container">
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
         console.log('Component Mounted');
      },
      methods: {
        addDog() {
          var app = this;
           console.log(this.dog_name);
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/dogs', { dog_name: this.dog_name })
                .then(function (resp) {
                    alert("Dog Added");
                    console.log(resp);
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not add Dog");
                });
            }
        }
    }
</script>