<template>
    <div class="container">
        <h2>Form Nasabah</h2>
        <form @submit.prevent="simpan()">
            <div class="mb-3 form-group">
                <label>Nama</label>
                <input type="text" class="form-control" v-model="nasabah.nama">
            </div>
            <div class="mb-3 form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" v-model="nasabah.alamat">
            </div>
            <div class="mb-3 form-group">
                <label>Telepon</label>
                <input type="text" class="form-control" v-model="nasabah.telepon">
            </div>
            <div class="mb-3 form-group">
                <label>Tanggal Lahir</label>
                <input type="text" class="form-control" v-model="nasabah.lahir">
            </div>
            <div class="mb-3 form-group">
                <label>Gender</label>
                <select v-model="nasabah.gender" class="form-control">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label>Agama Id</label>
                <input type="text" class="form-control" v-model="nasabah.agama_id">
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-warning" @click="clear()">Clear</button>
            </div>
        </form>
        
        <h2>Data Nasabah</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Telepon</td>
                    <td>Tanggal Lahir</td>
                    <td>Gender</td>
                    <td>Agama_ID</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(nasabah, index) in allNasabah" :key="nasabah.id">
                    <td>{{ nasabah.id }}</td>
                    <td>{{ nasabah.nama }}</td>
                    <td>{{ nasabah.alamat}}</td>
                    <td>{{ nasabah.telepon }}</td>
                    <td>{{ nasabah.lahir }}</td>
                    <td>{{ nasabah.gender }}</td>
                    <td>{{ nasabah.agama_id }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" @click="edit(nasabah)">Edit</button>
                            <button type="button" class="btn btn-danger" @click="remove(nasabah)">Delete</button>
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
        name : 'nasabah',
        data() {
            return {
                allNasabah : {},
                nasabah:{
                    'id':'',
                    'nama':'',
                    'alamat':'',
                    'telepon':'',
                    'lahir':'',
                    'gender':'',
                    'agama_id':'',

                }
            }
        },
        created() {
            console.log('Created !');
            this.loadAllNasabah();
        },
        mounted() {
            console.log('Mounted');
        },
        methods: {
            loadAllNasabah(){
                var url = `http://127.0.0.1:8000/api/nasabah/`;
                axios.get(url).then(
                    ({data})=>{
                        console.log(data);
                        this.allNasabah = data;
                    }
                );                
            },
            remove(nasabah){
                var url = `http://127.0.0.1:8000/api/nasabah/${nasabah.id}`;
                axios.delete(url).then(
                    ()=>{
                    console.log('Berhasil dihapus!');
                    this.loadAllNasabah();
                    }
                );
            },
            edit(nasabah){
                var url = `http://127.0.0.1:8000/api/nasabah/${nasabah.id}`;
                axios.get(url).then(
                    ({data})=>{
                        this.nasabah = data;
                        console.log(this.nasabah);
                    }
                );
            },
            simpan(){
                if(this.nasabah.id==''){
                    // simpan baru
                    var url = `http://127.0.0.1:8000/api/nasabah`;
                    axios.post(url,this.nasabah).then(
                        ()=>{
                            console.log('berhasil di simpan');
                            this.loadAllNasabah();
                            this.clear();
                        }
                    );
                }else{
                    var url = `http://127.0.0.1:8000/api/nasabah/${this.nasabah.id}`;
                    axios.put(url,this.nasabah).then(
                        ()=>{
                            console.log('Berhasil Di Edit');
                            this.loadAllNasabah();
                            this.clear();
                        }
                    );
                }
            },
            clear(){
                this.nasabah.id='';
                this.nasabah.nama='';
                this.nasabah.alamat='';
                this.nasabah.telepon='';
                this.nasabah.lahir='';
                this.nasabah.gender='';
                this.nasabah.agama_id='';
            }
        }
    }
</script>