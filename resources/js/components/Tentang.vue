<template>
    <div id=tentang>
        <br><br><br>
        <div class="bar">
            <ul>
                <li class="li-bar" ><a class="nav-link" href="#sejarah" style="text-decoration:none"><b>Sejarah</b></a></li>
                <li class="li-bar2"><a class="nav-link" href="#lokasi" style="text-decoration:none"><b>Lokasi</b></a></li>
                <li class="li-bar3"><a class="nav-link" href="#clients" style="text-decoration:none"><b>Kerjasama</b></a></li>
            </ul>
        </div>  

        <div class="relative"> 
            <section class="sec-sejarah" id="sejarah">       
                <img style="width:20cm;margin-left:150px" src="./aset/Sejarah.png"> 
            </section>
        
            <section class="sec-lokasi" id="lokasi">     
                <img style="width:20cm;margin-left:150px" src="./aset/lokasi.png"> 
            </section>

            <section id="clients">   
                <img style="width:20cm;margin-left:150px" src="./aset/kerjasama.png"> 
            </section>
        </div>
    </div>
</template>

<style>
.bar {
    position: relative;
    width: 80%;
    height: 3cm;
    margin-left: 15%;
    top: 200px;
    border: 5px solid #db214c;
    background-color: #db214c;   
    display: block;
}

div.relative{
    position: absolute;
    width: 80%;
    height: 600px;
    border: 3px solid #ffffff;
    top: 350px;
    left: 15%;
    background-color: #ffffff; 
}

.nav-link{
    color: #ffffff;
}

.content{
    text-align: justify;
    text-indent: 50px;
    margin-left: 40px;
    margin-right: 40px;
}

h4{
    text-align: center;
}
h5{
    text-align: center;
    color: #db214c;
    font-size: 10pt;
}

.li-bar {
    display: block;
    padding: 0 20px;
    position:absolute;
    top:10px;
    left:150px;
}

.li-bar2{
    display: block;
    padding: 0 20px;
    position:absolute;
    top:10px;
    left:480px;
}

.li-bar3{
    display: block;
    padding: 0 20px;
    position:absolute;
    top:10px;
    left:800px;
}

.module {
    scroll-behavior: [smooth];
}
  
  section {
    position: relative;
    width: 100%;
    height: 600px;
    border: 3px solid #ffffff;
    background-color: #ffffff; 
  } 

  .gambar{
    width: 400px;
    height: 200px;
    margin-left: 9cm;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
</style>
