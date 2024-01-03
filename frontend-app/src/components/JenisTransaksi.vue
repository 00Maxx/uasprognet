<template>
    <div class="container">
        <h2>Form Jenis Transaksi</h2>
        <form @submit.prevent="simpan()">
            <div class="mb-3 form-group">
                <label>Jenis Transaksi</label>
                <input type="text" class="form-control" v-model="jenistransaksi.jenistransaksi">
            </div>
            <div class="mb-3 form-group">
                <label>Operator</label>
                <input type="text" class="form-control" v-model="jenistransaksi.operator">
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-warning" @click="clear()">Clear</button>
            </div>
        </form>
        
        <h2>Data Jenis Transaksi</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Jenis Transaksi</td>
                    <td>Operator</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(jenistransaksi, index) in allJenisTransaksi" :key="jenistransaksi.id">
                    <td>{{ jenistransaksi.id }}</td>
                    <td>{{ jenistransaksi.jenistransaksi }}</td>
                    <td>{{ jenistransaksi.operator}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" @click="edit(jenistransaksi)">Edit</button>
                            <button type="button" class="btn btn-danger" @click="remove(jenistransaksi)">Delete</button>
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
        name : 'jenistransaksi',
        data() {
            return {
                allJenisTransaksi : {},
                jenistransaksi:{
                    'id':'',
                    'jenistransaksi':'',
                    'operator':'',
                }
            }
        },
        created() {
            console.log('Created !');
            this.loadAllJenisTransaksi();
        },
        mounted() {
            console.log('Mounted');
        },
        methods: {
           async loadAllJenisTransaksi(){
                var url = `https://api-group12-prognet.manpits.xyz/api/jenistransaksi/`;
                await axios.get(url).then(
                    ({data})=>{
                        console.log(data);
                        this.allJenisTransaksi = data;
                    }
                );                
            },
            remove(jenistransaksi){
                var url = `https://api-group12-prognet.manpits.xyz/api/jenistransaksi/${jenistransaksi.id}`;
                axios.delete(url).then(
                    ()=>{
                    console.log('Berhasil dihapus!');
                    this.loadAllJenisTransaksi();
                    }
                );
            },
           async edit(jenistransaksi){
                var url = `https://api-group12-prognet.manpits.xyz/api/jenistransaksi/${jenistransaksi.id}`;
                await axios.get(url).then(
                    ({data})=>{
                        this.jenistransaksi = data;
                        console.log(this.jenistransaksi);
                    }
                );
            },
            simpan(){
                if(this.jenistransaksi.id==''){
                    // simpan baru
                    var url = `https://api-group12-prognet.manpits.xyz/api/jenistransaksi`;
                    
                    axios.post(url,this.jenistransaksi).then(
                        ()=>{
                            console.log('berhasil di simpan');
                            this.loadAllJenisTransaksi();
                            this.clear();
                        }
                    );
                    
                }else{
                    var url = `https://api-group12-prognet.manpits.xyz/api/jenistransaksi/${this.jenistransaksi.id}`;
                    axios.put(url,this.jenistransaksi).then(
                        ()=>{
                            console.log('Berhasil Di Edit');
                            this.loadAllJenisTransaksi();
                            this.clear();
                        }
                    );
                }
            },
            clear(){
                this.jenistransaksi.id='';
                this.jenistransaksi.jenistransaksi='';
                this.jenistransaksi.operator='';
            }
        }
    }
</script>