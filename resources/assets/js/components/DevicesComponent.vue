<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3" v-for="(device, key) in devices">
                <div :style="{ backgroundColor: 'antiquewhite',margin:'5px' }">
                    <h4>{{device.name}}</h4>
                    {{device.description}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                devices:[]
            };
        },
        mounted() {
            var that = this;
            axios.get("/api/devices/").then(function(res){
                that.devices = res.data;
            }).catch(function(err){
                alert(err.response.message);
            });
        }
    }
</script>
