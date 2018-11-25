<template>
  <div class="content" id="daftar"> 
    <div class="center" >
      <h2 class="a" > Daftar </h2><br/><br/><br/>

        <form>
             <input type="text" id="nama" class="kolom" v-model="name" placeholder="Nama . . "  required='required'>
             <hr color="#667ab3" size="2px" width="60%"/><br>  
             <input type="email" id="email" class="kolom" v-model="email" size="100" placeholder="Email . . "  required>
             <hr color="#667ab3" size="2px" width="60%"/><br>
             <input type="text" id="username" class="kolom" v-model="username" size="100" placeholder="Username . . "  required>
             <hr color="#667ab3" size="2px" width="60%"/><br> 
             <input type="password" id="password" class="kolom" v-model="password" size="100" placeholder="Password . . " required>
             <hr color="#667ab3" size="2px" width="60%"/><br><br> 
            <button type="submit" class="button is-link"  @click="handleSubmit">Daftar</button>  
        </form>
    </div>
  </div>
</template>

<style>
p.a {
			
		font-family: Arial, Helvetica, sans-serif;
		color:#333;
	}
	
p2 {
	color:white;
}

h1,h2 {	
	font-family: Arial, Helvetica, sans-serif;
	color: #db214c;	
	}
	
.a {
		font-size:200%;
		position:absolute;
		left:160px;
		color:#667ab3;
	}

.d{
	font-size:200%;
	text-align: center;
	left:50px;
	color:#667ab3;
}
	
.b {
	
	font-size:120%;
	color:#667ab3;
	margin-top:100px;
}

.c {
	font-size:100%;
	color:#667ab3;
	font-family: Arial, Helvetica, sans-serif;
	margin: 0 165px;
}

.e{
	text-align: center;
	color: black;
	font-size: 15pt;
}

.f{
	font-size: 10pt;
	color: #667ab3;
	font-family: Arial, Helvetica, sans-serif;
	margin-left: 50px;
}
	
.center {
  position:absolute;
	top: 270px;
	left:480px;
  width: 30%;
  padding: 20px;
	border-radius: 18px;
	background-color: #ffffff;
	box-shadow: 0 0 40px rgba(0,0,0,0.8);
	margin-bottom:100px;
}

	
input, button, select, radio{
  	width: 60%;
    padding: 12px 20px;
    margin: 8px 80px;
    display: inline-block;
    border: 0px solid white;
    box-sizing: border-box;
}

button[type=submit] {
    width: 40%;
    background-color: #667ab3;
    color: white;
    padding: 14px 20px;
    margin: 8px 120px;
    border: none;
    border-radius: 4px;
	  cursor: pointer;
	}
	
button[type=submit]:hover {
    background-color: #667ab3
	}
	
p3 {
	color:white;
	position:relative;
	top:15px;
	left:20px;
}

.kolom{
    width: 250px;
}

hr{
    width: 60%
}
</style>


<script>
    export default { 
      props : ['nextUrl'],
        data(){
            return {
                name : "",
                email : "",
                username: "",
                password : "",
            }
        },   
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                if (this.password <= 0 && this.name=="" && this.username=="" && this.email=="") {
                    return alert('Data harus terisi semua')
                }
                let name = this.name
                let email = this.email
                let username = this.username
                let password = this.password
                axios.interceptors.request.use((config) => {
                    const newConfig = config;
                    newConfig.headers.Authorization = `Bearer ${localStorage.getItem('jajanpasar.jwt')}`;
                    return newConfig;
                });
                axios.post('api/daftar', {name, email, username, password}).then(response => {
                    let data = response.data
                    localStorage.setItem('jajanpasar.user', JSON.stringify(data.user))
                    localStorage.setItem('jajanpasar.jwt', data.token)
                    alert('Pendaftaran berhasil!')
                    if (localStorage.getItem('jajanpasar.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/profile'))
                    }
                })
            }
        } 
    }
</script>