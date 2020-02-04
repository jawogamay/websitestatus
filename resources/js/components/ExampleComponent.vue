<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Hosting 1 Website Status</div>

                    <div class="card-body">
                       <b class="text-success"> {{hosting1}}</b>
                    </div>
                </div>
            </div>
              <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Hosting 2 Website Status</div>

                    <div class="card-body">
                       <b :class="{'text-danger': this.media}" class="text-success"> {{hosting2}}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchHosting1();
           this.fetchHosting2();
           this.intervalFetchData();
        },
        data(){
            return{
                hosting1:'',
                hosting2:'',
            }
        },
        methods:{
            fetchHosting1(){

        
                axios.get('/get-hosting1').then((response) => {
                    this.hosting1 = response.data
                }).catch((error)=>{
                    console.log(error)
                })
                },
                 fetchHosting2(){

        
                axios.get('/get-hosting2').then((response) => {
                    this.hosting2 = response.data
                }).catch((error)=>{           

                })
                },
                intervalFetchData(){
                    setInterval(() => {    
                    this.fetchHosting1();
                    this.fetchHosting2();
                    }, 180000);    
                },
                somethingWrong(){
                    if(this.hosting1>200){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        };
</script>
