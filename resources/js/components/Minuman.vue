<template>

<div class="Awal">
<ul>

<h1>Produk Minuman </h1>
<br/><table  class="table table-hover table-striped">
    
    <tr>
        <th >Nama Makanan</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Button</th>
    </tr>

            
                        <tr  v-for="namaMakanan of minuman"
		                v-bind:key="namaMakanan['key']">
                            <td style ="text-align : center" > {{namaMakanan.nama}}</td>
                            <td> {{namaMakanan.deskripsi}} </td>
                            <td> {{namaMakanan.harga}} </td>
                            <td><button class="btn btn-success" @click = "addKeranjang(namaMakanan)" >Masukkan Keranjang</button></td>
                        </tr>
                   
                </table>

        
        
    </li>
    </ul>
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
            response:[],
            transaksi:[],
            produk:[],
            makanan:[],
            minuman:[],
        }
    },
    methods:{
        async getProduk(){
            this.produk = await Controller.getProduk()
            this.makanan = this.produk.filter(p=>p.tipe == "makanan")
            this.minuman = this.produk.filter(p=>p.tipe == "minuman")
            console.log(this.makanan)
            console.log(this.minuman)
            console.log(this.produk)
        },

         async addKeranjang(produk){
                 try {
                this.response = await Controller.addKeranjang(produk.nama, produk.deskripsi, produk.harga)
                
                  console.log(this.response)
            } catch (err) {
                console.log(err)
            } 
            alert("Telah ditambahkan di Keranjang")
               
        },
        
       
    },

    mounted(){
        this.getProduk()
    }
}
</script>

<style >
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