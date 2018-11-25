<template>
  <div class="content" id="login"> 
    <form>
        <div class="center" >
            <h2 class="a" > Halo,</h2><br>
            <h2 class="a" > Selamat Datang </h2>
            <h2 class="b" align="center"> <b> Masuk ke Akun Anda </b></h2><br>
            <input type="email" id="email" class="kolom" v-model="email" size="100" placeholder="Email . . "  required autofocus>
            <hr color="#667ab3" size="2px" width="60%"/>
            <input type="password" id="password" class="kolom" v-model="password" size="100" placeholder="Password . . " required><br>
            <hr color="#667ab3" size="2px" width="60%"/><br><br> 
            <button type="submit" class="btn btn-primary" @click="handleSubmit">
                Login
            </button>                         
        </div>
    </form>
  </div>
</template>

<style>

.kolom{
    width: 250px;
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
		font-size:120%;
		position:absolute;
		left:50px;
		color:#667ab3;
	}
	
.b {
	
	font-size:100%;
	color:#667ab3;
	margin-top:100px;
}

.c {
	font-size:100%;
	color:#667ab3;
	font-family: Arial, Helvetica, sans-serif;
	margin: 0 165px;
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

	
input, select, radio{
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

.keranjang-font {
	position: absolute;
	top: 240px;
	left: 560px;
}
</style>


<script>
    import http from '../http';
     export default {
            data() {
                return {
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {
                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password
                        alert('Login berhasil');
                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin

                            localStorage.setItem('jajanpasar.user', JSON.stringify(user))
                            localStorage.setItem('jajanpasar.jwt', response.data.token)

                            http.setToken(localStorage.getItem('jajanpasar.jwt'));

                            if (localStorage.getItem('jajanpasar.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                this.$router.push((is_admin == 1 ? 'admin' : 'profile'))
                            }
                        }
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error.response)
                    });
                }
            }
        }
    }
</script>