<template>
  <div class="content" id="profile"> 
    <form>
      <div class="center" >
        <h2 class="d" position="center" >My Profile </h2><br>
            <div class="widget-user-image">
                <img class="img-circle" src="./aset/avatar.png" style="width:200px; height:200px; position:absolute; bottom:370px; left:100px; border-radius:50%" alt="User Avatar">
            </div><br><br><br><br><br><br><br><br>
            <input type="text" v-model="name" id="inputName" placeholder="Name">
            <hr color="#667ab3" size="2px" width="60%"/>

            <input type="text" v-model="username" id="inputUserame" placeholder="Username">
            <hr color="#667ab3" size="2px" width="60%"/>

            <input type="text" v-model="email" id="inputUserame" readonly>
            <hr color="#667ab3" size="2px" width="60%"/>
            
            <button @click.prevent="update" type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</template>

<style>
.widget-user .card-footer{
    padding: 0;
}
.widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 250px !important;
}
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
import http from '../http';

 export default {
        data(){
            return {
                name: '',
                username: '',
                email: '',
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods:{
            setDefaults() {
                let user = JSON.parse(localStorage.getItem('jajanpasar.user'))
                this.name = user.name
                this.username = user.username
                this.email = user.email
                this.password = user.password
                this.user_type = user.is_admin
            },  
            update(){
                let user_data = JSON.parse(localStorage.getItem('jajanpasar.user'))
                let user = this.users
                let name = this.name
                let username = this.username
                let payload = {
                    username: username,
                    name: name,
                }
                axios.interceptors.request.use((config) => {
                    const newConfig = config;
                    newConfig.headers.Authorization = `Bearer ${localStorage.getItem('jajanpasar.jwt')}`;

                    return newConfig;
                });
                axios.patch(`/api/users/${user_data.id}`, payload)
                .then(response => {
                    this.name = name
                    this.username = username
                    console.log("Berhasil!")
                    this.$forceUpdate()
                })
                .catch(error => {
                    console.error(error);
                }) 
            }
        },
        beforeMount(){
            axios.interceptors.request.use((config) => {
                const newConfig = config;
                newConfig.headers.Authorization = `Bearer ${localStorage.getItem('jajanpasar.jwt')}`;

                return newConfig;
            });

            // http.setToken(localStorage.getItem('jajanpasar.jwt'));
            axios.get('/api/users/').then(response => this.users = response.data)
        },
    }
</script>