<template>
    <div class="my-4">
        <!--@click.prevent prevent the browser from refreshing
        when save button is clicked-->
        <button v-if="show" @click.prevent="unsave()" 
        class="btn btn-primary w-100"> Unsave</button>

        <button v-else  @click.prevent="save()" 
        class="btn btn-warning w-100">save</button>
           
    </div>
</template>

<script>
    export default {
        props:['jobid','favorited'],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        },
        mounted(){
           this.show=this.jobFavorited ? true:false;
        },
        computed:{
           jobFavorited(){
               return this.favorited
           }
        },
        methods:{
            save(){
            
              axios.post('/save/'+this.jobid).then(
                  response=>this.show=true)
                  .catch(error=>alert(error))
              
            },  
            unsave(){
                axios.post('/unsave/'+this.jobid).then(
                  response=>this.show=false)
                  .catch(error=>alert(error))
            }
        }
       
    }
</script>