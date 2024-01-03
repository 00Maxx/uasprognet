<template>
    <div class="container">
        <h2>Form Tabungan</h2>
        <form @submit.prevent="simpan()">
            <div class="mb-3 form-group">
                <label>Nasabah ID</label>
                <input type="text" class="form-control" v-model="tabungan.nasabah_id">
            </div>
            <div class="mb-3 form-group">
                <label>Jenis Transaksi ID</label>
                <input type="text" class="form-control" v-model="tabungan.jenistransaksi_id">
            </div>
            <div class="mb-3 form-group">
                <label>Nominal</label>
                <input type="text" class="form-control" v-model="tabungan.nominal">
            </div>
            <div class="mb-3 form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" v-model="tabungan.keterangan">
            </div>
            <div class="mb-3 form-group">
                <label>User ID</label>
                <input type="text" class="form-control" v-model="tabungan.user_id">
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-warning" @click="clear()">Clear</button>
            </div>
        </form>
        
        <h2>Data Tabungan</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nasabah ID</td>
                    <td>Jenis Transaksi ID</td>
                    <td>Nominal</td>
                    <td>Keterangan</td>
                    <td>User ID</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(tabungan, index) in allTabungan" :key="tabungan.id">
                    <td>{{ tabungan.id }}</td>
                    <td>{{ tabungan.nasabah_id }}</td>
                    <td>{{ tabungan.jenistransaksi_id}}</td>
                    <td>{{ tabungan.nominal }}</td>
                    <td>{{ tabungan.keterangan }}</td>
                    <td>{{ tabungan.user_id }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" @click="edit(tabungan)">Edit</button>
                            <button type="button" class="btn btn-danger" @click="remove(tabungan)">Delete</button>
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
        name : 'tabungan',
        data() {
            return {
                allTabungan : {},
                tabungan:{
                    'id':'',
                    'nasabah_id':'',
                    'jenistransaksi_id':'',
                    'nominal':'',
                    'keterangan':'',
                    'user_id':'',
                    }
            }
        },
        created() {
            console.log('Created !');
            this.loadAllTabungan();
        },
        mounted() {
            console.log('Mounted');
        },
        methods: {
            loadAllTabungan(){
                var url = `https://api-group12-prognet.manpits.xyz/api/tabungan/`;
                axios.get(url).then(
                    ({data})=>{
                        console.log(data);
                        this.allTabungan = data;
                    }
                );                
            },
            remove(tabungan){
                var url = `https://api-group12-prognet.manpits.xyz/api/tabungan/${tabungan.id}`;
                axios.delete(url).then(
                    ()=>{
                    console.log('Berhasil dihapus!');
                    this.loadAllTabungan();
                    }
                );
            },
            edit(tabungan){
                var url = `https://api-group12-prognet.manpits.xyz/api/tabungan/${tabungan.id}`;
                axios.get(url).then(
                    ({data})=>{
                        this.tabungan = data;
                        console.log(this.tabungan);
                    }
                );
            },
            simpan(){
                if(this.tabungan.id==''){
                    // simpan baru
                    var url = `https://api-group12-prognet.manpits.xyz/api/tabungan`;
                    axios.post(url,this.tabungan).then(
                        ()=>{
                            console.log('berhasil di simpan');
                            this.loadAllTabungan();
                            this.clear();
                        }
                    );
                }else{
                    var url = `https://api-group12-prognet.manpits.xyz/api/tabungan/${this.tabungan.id}`;
                    axios.put(url,this.tabungan).then(
                        ()=>{
                            console.log('Berhasil Di Edit');
                            this.loadAllTabungan();
                            this.clear();
                        }
                    );
                }
            },
            clear(){
                this.tabungan.id='';
                this.tabungan.nasabah_id='';
                this.tabungan.jenistransaksi_id='';
                this.tabungan.nominal='';
                this.tabungan.keterangan='';
                this.tabungan.user_id='';
                }
        }
    }
</script>