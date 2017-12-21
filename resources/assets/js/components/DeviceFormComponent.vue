<template>
    <div class="container">
        <div class="row">
            <h2>{{type.capitalize()}} Device</h2>
        </div>
        <div class="row">
            <div class="alert alert-danger" v-if="errors" role="alert">
                <div v-for="(field, key) in errors">
                    <b>{{key}}: </b>
                    <span v-for="(error, key1) in field">{{error}}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" v-model="device.name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" v-model="device.description"></textarea>
                    </div>

                    <a class="btn btn-default" href="/devices">Cancel</a>
                    <div class="btn btn-success" @click="create">{{type.capitalize()}} device</div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['item','type'],
        data(){
            return {
                errors:null,
                device:(this.item)?JSON.parse(this.item):{}
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            create:function(){
                var that = this;
                var method = null;
                if(that.type === 'edit'){
                    method = axios.put("/api/devices/"+that.device.id,that.device);
                }else if(that.type === 'create'){
                    method = axios.post("/api/devices",that.device);
                }

                method.then(function(res){
                    window.location.href = "/devices";
                }).catch(function(err){
                    err = err.response.data;
                    that.errors = err.errors;
                });
            }
        }
    }
</script>
