<template>
    <div class="container">
        <h2>Form User</h2>
        <form @submit.prevent="simpan()">
            <div class="mb-3 form-group">
                <label>Name</label>
                <input type="text" class="form-control" v-model="user.name">
            </div>
            <div class="mb-3 form-group">
                <label>Email</label>
                <input type="text" class="form-control" v-model="user.email">
            </div>
            <div class="mb-3 form-group">
                <label>Password</label>
                <input type="text" class="form-control" v-model="user.password">
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-warning" @click="clear()">Clear</button>
            </div>
        </form>
        
        <h2>Data User</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in allUser" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email}}</td>
                    <td>{{ user.password}}</td>
                    
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" @click="edit(user)">Edit</button>
                            <button type="button" class="btn btn-danger" @click="remove(user)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'redaxios';

    export default {
        name : 'user',
        data() {
            return {
                allUser : {},
                user:{
                    'id':'',
                    'name':'',
                    'email':'',
                    'password':'',
                }
            }
        },
        created() {
            console.log('Created !');
            this.loadAllUser();
        },
        mounted() {
            console.log('Mounted');
        },
        methods: {
            loadAllUser(){
                var url = `https://api-group12-prognet.manpits.xyz/api/user/`;
                axios.get(url).then(
                    ({data})=>{
                        console.log(data);
                        this.allUser = data;
                    }
                );                
            },
            remove(user){
                var url = `https://api-group12-prognet.manpits.xyz/api/user/${user.id}`;
                axios.delete(url).then(
                    ()=>{
                    console.log('Berhasil dihapus!');
                    this.loadAllUser();
                    }
                );
            },
            edit(user){
                var url = `https://api-group12-prognet.manpits.xyz/api/user/${user.id}`;
                axios.get(url).then(
                    ({data})=>{
                        this.user = data;
                        console.log(this.user);
                    }
                );
            },
            simpan(){
                if(this.user.id==''){
                    // simpan baru
                    var url = `https://api-group12-prognet.manpits.xyz/api/user`;
                    axios.post(url,this.user).then(
                        ()=>{
                            console.log('berhasil di simpan');
                            this.loadAllUser();
                            this.clear();
                        }
                    );
                }else{
                    var url = `https://api-group12-prognet.manpits.xyz/api/user/${this.user.id}`;
                    axios.put(url,this.user).then(
                        ()=>{
                            console.log('Berhasil Di Edit');
                            this.loadAllUser();
                            this.clear();
                        }
                    );
                }
            },
            clear(){
                this.user.id='';
                this.user.name='';
                this.user.email='';
                this.user.password='';
                
            }
        }
    }
</script>