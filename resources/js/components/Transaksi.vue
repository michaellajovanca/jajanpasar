<template>

<div class="Awal">
<ul>

<h1>Rincian Belanja </h1>
<br/><table  class="table table-hover table-striped">
    
    <tr>
        <th style ="text-align : center" >Nama Makanan</th>
        <th style ="text-align : center">Deskripsi</th>
        <th style ="text-align : center">Harga</th>
        <th style ="text-align : center">Button</th>
    </tr>

                        <tr  v-for="namaMakanan of trans"
		                v-bind:key="namaMakanan['key']">
                            <td style ="text-align : center" > {{namaMakanan.nama}}</td>
                            <td style ="text-align : center"> {{namaMakanan.deskripsi}} </td>
                            <td style ="text-align : center"> {{namaMakanan.harga}} </td>
                           <td style ="text-align : center"><button class="btn btn-danger" @click="deleteTransaksi(namaMakanan.id)" >Batal</button></td>
                        </tr>
                </table>

                <hr color="#667ab3" size="2px" width="95%"/>

                <br/><table  class="table table-hover table-striped">
    
    <tr>
        <th></th>
        <th style ="text-align : center">Total Harga : </th>
        <th style ="text-align : center"></th>
    </tr>
    </table>

    <br/><button class="btn btn-success" style="width:100%" >Beli</button></td>



            

        
        
    </li>
    </ul>
</div>

</template>

<script>
import Controller from '../httpController'

export default{
    data(){
        return{
             
            response:[],
            trans:[],
        }
    },

    methods:{
        
    async getTransaksi(){
            this.trans = await Controller.getTransaksi()
            
            console.log(this.transaksi)
        },

        async deleteTransaksi(id){
             
             try {
                this.produk = await Controller.deleteTransaksi(id)
                await this.getTransaksi()
                 } catch (err) {
               console.log(err)
            }
               alert("Produk Berhasil di hapus dari keranjang")
               
        },
    },

    mounted(){
        this.getTransaksi()
    }
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