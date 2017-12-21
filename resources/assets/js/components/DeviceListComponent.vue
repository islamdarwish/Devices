<template>
    <div class="container">
        <div class="row">
            <h2>Devices</h2>
        </div>
        <div class="row">
            <div class="alert alert-danger" v-if="error" role="alert">
                <b>Error: </b>{{error}}
            </div>
            <div class="alert alert-success" v-if="success" role="alert">
                {{success}}
            </div>
        </div>
        <div class="row">
            <a href="devices/create" class="btn btn-success">Create Device</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                    <th>Options</th>
                    </thead>
                    <tbody>
                        <tr v-for="(device, key) in devices">
                            <td>{{device.name}}</td>
                            <td>{{device.description}}</td>
                            <td>
                                <a :href="'/devices/edit/'+device.id" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger" @click="deleteDevice(key)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                devices:[],
                error:'',
                success:''
            };
        },
        mounted() {
            var that = this;
            axios.get('api/devices').then(function(res){
                that.devices = res.data;
            }).catch(function(res){
                alert("error happ");
            });
        },
        methods:{
            deleteDevice: function(key){
                var that = this;
                axios.delete('api/devices/'+that.devices[key].id).then(function(res){
                    Vue.delete(that.devices, key);
                    that.success = "Successfully deleted";
                    that.error = null;
                }).catch(function(err){
                    that.error = err.message;
                    that.success = "";
                });
            }
        }
    }
</script>
