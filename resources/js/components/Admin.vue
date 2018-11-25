<template>

<div class="Awal">
<ul>
    <h1>User </h1>
<br/><table class="table table-hover table-striped">
    <tr>
        <th style ="text-align : center">Nama User</th>
        <th style ="text-align : center">Email</th>
        <th style ="text-align : center">Button</th>
    </tr>

                        <tr v-for="namaUser of user"
		                v-bind:key="namaUser['key']">
                            <td style ="text-align : center"> {{namaUser.name}}</td>
                            <td style ="text-align : center"> {{namaUser.email}} </td>
                            <td style ="text-align : center" ><button class="btn btn-danger" @click="deleteUser(namaUser.id)" >Delete</button>
                            <button class="btn btn-success" @click="editUser(namaUser.id)"  >Edit</button></td>
                        </tr>
                    
                </table>
</ul>
<br><br><br>

<ul>
<h1>Produk Makanan </h1>
<br/><table  class="table table-hover table-striped">
    
    <tr>
        <th style ="text-align : center">Nama </th>
        <th style ="text-align : center"> Desk</th>
        <th style ="text-align : center">Harga</th>
        <th style ="text-align : center">Button</th>
    </tr>

                        <tr  v-for="namaMakanan of makanan"
		                v-bind:key="namaMakanan['key']">
                            <td style ="text-align : center" > {{namaMakanan.nama}}</td>
                            <td style ="text-align : center"> {{namaMakanan.deskripsi}} </td>
                            <td style ="text-align : center"> {{namaMakanan.harga}} </td>
                            <td style ="text-align : center" ><button class="btn btn-danger" @click="deleteProduk(namaMakanan.id)" >Delete</button>
                             <button class="btn btn-success" >Edit</button></td>
                        </tr>
            
                </table>

   
<br/><br/><br/>
<h1>Produk Minuman </h1>
<br/><table class="table table-hover table-striped">
    <tr>
        <th style ="text-align : center">Nama</th>
        <th style ="text-align : center">Desk</th>
        <th style ="text-align : center">Harga</th>
        <th style ="text-align : center">Button</th>
    </tr>

                        <tr v-for="namaMinuman of minuman"
		                v-bind:key="namaMinuman['key']">
                            <td style ="text-align : center"> {{namaMinuman.nama}}</td>
                            <td style ="text-align : center"> {{namaMinuman.deskripsi}} </td>
                            <td style ="text-align : center"> {{namaMinuman.harga}} </td>
                            <td style ="text-align : center" ><button class="btn btn-danger" @click="deleteProduk(namaMinuman.id)" >Delete</button>
                            <button class="btn btn-success" @click="editProduk(namaMinuman.id)"  >Edit</button></td>
                        </tr>
                    
                </table>

</ul>	



<div class="Utama" >	


    <h1 style="font-size : 150%"> Tambah Produk </h1> <br/>
	<label>Nama : </label>
	<input type="text" v-model="nama_makanan"/> <br/>
	
	
	<label>Dskrps : </label>
	<input type="text" v-model="deskripsi_makanan"/><br/>
	
	<label>Harga : </label>
	<input type="text" v-model="harga_makanan"/><br/>

    <label> Tipe Produk : </label>
	<select id="type" v-model="tipe" class="form-control mt-2 w-85" name="type" style="width:20%">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option> </select><br/>
	
	<button class="btn btn-success" @click="addProduk">Add</button><br><hr>
	
    </div>
<ul>
    <h1>Diskon </h1>
<br/><table class="table table-hover table-striped">
    <tr>
        <th style ="text-align : center">Nama Diskon</th>
        <th style ="text-align : center">Jumlah Diskon</th>
        <th style ="text-align : center">Button</th>
    </tr>

                        <tr v-for="namaDiskon of diskon"
		                v-bind:key="namaDiskon['key']">
                            <td style ="text-align : center"> {{namaDiskon.nama_diskon}}</td>
                            <td style ="text-align : center"> {{namaDiskon.jumlah_diskon}} </td>
                            <td style ="text-align : center" ><button class="btn btn-danger" @click="deleteDiskon(namaDiskon.id)" >Delete</button>
                            <button class="btn btn-success" @click="editProduk(namaDiskon.id)"  >Edit</button></td>
                        </tr>
                    
                </table>
</ul>
<br><br><br>
<div class="Utama" >	


    <h1 style="font-size : 150%"> Tambah Diskon </h1> <br/>
	<label>Diskon : </label>
	<input type="text" v-model="nama_diskon"/> <br/>
	
	
	<label>Jumlah : </label>
	<input type="text" v-model="jumlah_diskon"/><br/>
	
	<button class="btn btn-success" @click="addDiskon">Add</button><br><hr>
	
    </div>
<br><br><br>
</div>




</template>


<script>
import Controller from '../httpController'

export default{
    data(){
        return{
             nama_makanan:'',
             deskripsi_makanan:'',
             harga_makanan:'',
             tipe:'',
             id:'',
            response:[],
            produk:[],
            makanan:[],
            minuman:[],
            nama_diskon:'',
            jumlah_diskon: 0,
            diskon:[],
            name:'',
            email:'',
            user:[]
        }
    },

    

    methods:{
        async addProduk(){
             try {
                this.response = await Controller.addProduk(this.nama_makanan,this.deskripsi_makanan, this.harga_makanan,this.tipe)
                this.nama_makanan = ""
                this.deskripsi_makanan = ""
                this.harga_makanan = ""
                this.tipe = ""
                alert("Produk Berhasil di tambahkan")
                await this.getProduk()
                console.log(this.response)
            } catch (err) {
                console.log(err)
            }
               
        },
        

        async getProduk(){
            this.produk = await Controller.getProduk()
            this.makanan = this.produk.filter(p=>p.tipe == "makanan")
            this.minuman = this.produk.filter(p=>p.tipe == "minuman")
            console.log(this.makanan)
            console.log(this.minuman)
            console.log(this.produk)
        },

        

        async deleteProduk(id){
             
             try {
                this.produk = await Controller.deleteProduk(id)
                
                 } catch (err) {
               console.log(err)
            }
               alert("Produk Berhasil di hapus")
               
        },
        async addDiskon(){
             try {
                this.response = await Controller.addDiskon(this.nama_diskon,this.jumlah_diskon)
                this.nama_diskon = ""
                this.jumlah_diskon = ""
                alert("Diskon Berhasil di tambahkan")
                await this.getDiskon()
                console.log(this.response)
            } catch (err) {
                console.log(err)
            }
               
        },

        async getDiskon(){
            this.diskon = await Controller.getDiskon()
            console.log(this.diskon)
        },

        async deleteDiskon(id){
             
             try {
                this.diskon = await Controller.deleteDiskon(id)
                
                 } catch (err) {
               console.log(err)
            }
               alert("diskon Berhasil di hapus")
               
        },

        async getUser(){
            this.user = await Controller.getUser()
            console.log(this.user)
        },

        async deleteUser(id){
             
             try {
                this.user = await Controller.deleteUser(id)
                
                 } catch (err) {
               console.log(err)
            }
               alert("User Berhasil di hapus")
               
        },

        // async getallevent () {
        //     // console.log(this.parsingdata)
        //     try {
        //         this.allevent = await Controller.getallevent()
        //         this.eventOn=this.allevent.data.filter(Filter.EventOn).reverse()
        //         this.eventHighlight=this.allevent.data.filter(Filter.EventHighlight).filter(Filter.EventOn)
                
        //         this.eventcount=this.eventOn.length
                
        //         console.log(this.allevent.data)
        //     } catch (err) {
        //         console.log(err)
        //     }
        // }
    },
    mounted(){
        this.getProduk()
        this.getDiskon()
        this.getUser()
    },
    

    
}
</script>

<style scoped>
.Awal {
	position:absolute;
	top: 270px;
	left:	150px;
    width: 80%;
    padding: 20px;
	border-radius: 18px;
	color:#db214c;
	margin-bottom:100px;

}

.Utama {
	
	top: 270px;
	left:	150px;
    width: 80%;
    padding: 20px;
	border-radius: 18px;
	color:#db214c;
	margin-bottom:100px;

}

	.Kedua {
		padding: 10px;
		color : #555;
	}

table td {

    background-color:white;
}

table th {

    background-color:#db214c;
    color: white;
}
</style>