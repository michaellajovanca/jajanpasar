<template>
    <div class="center" >
		<h2 class="a" > Kontak </h2><br>
		<hr color="#667ab3" size="2px" width="90%"/>
	    <table>
	    <tr>	
            <td><input type="text" name="nama" size="100" v-model="username"  placeholder="Username . . "  required>
            <hr color="#667ab3" size="2px" width="60%"/></td>
            
            <td><input type="text" name="email" size="100"  v-model="email"  placeholder="Email . . "  required>
            <hr color="#667ab3" size="2px" width="60%"/> </td>
		</tr>
		</table>
		
		<p class="b"> <b> Pesan </b> </p>
		<input class="pesan" type="text" name="" size="100"  v-model="text" placeholder="Tuliskan Pesan Anda. . "  required>
		
        <button type="submit" class="button is-link"  @click="kirim">Kirim</button>  
    </div>
</template>

<style>
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
    background-color: hsl(224, 34%, 55%);
    color: white;
    padding: 10px 20px;
    margin: 8px 120px;
    border: none;
    border-radius: 4px;
	  cursor: pointer;
	}
	
button[type=submit]:hover {
    background-color: #667ab3
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
		font-size:150%;
		position:absolute;
		left:60px;
		color:#667ab3;
	}
	
.b {
	
	font-size:120%;
	color:#667ab3;
	margin-top:40px;
	margin-left:60px;
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
	left:280px;
    width: 60%;
    padding: 20px;
	border-radius: 18px;
	background-color: #ffffff;
	box-shadow: 0 0 40px rgba(0,0,0,0.8);
	margin-bottom:100px;
}

	
input, select, radio{
	width: 65%;
    padding: 12px 20px;
    margin: 8px 70px;
    display: inline-block;
    border: 0px solid white;
    box-sizing: border-box;
	}

.pesan {
	width: 85%;
	height: 10em;
    padding: 12px 20px;
    margin: 6px 60px;
    display: inline-block;
    border: 2px solid #667ab3;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #667ab3;
    color: white;
    padding: 14px 20px;
    margin: 8px 320px;
    border: none;
    border-radius: 4px;
	cursor: pointer;
	}
	
input[type=submit]:hover {
    background-color: #667ab3
	}
	
p3 {
	color:white;
	position:relative;
	top:15px;
	left:20px;
}
</style>

<script>
export default { 
      props : ['nextUrl'],
        data(){
            return {
				username: null,
				email: null,
				text: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('jajanpasar.jwt') != null
            }
		},   
		mounted() {
            this.setDefaults()
        },
        methods : {
            kirim(e) {
                e.preventDefault()
                if (this.password <= 0 && this.name=="" && this.username=="" && this.email=="") {
                    return alert('Data harus terisi semua')
                }
                let email = this.email
                let username = this.username
                let text = this.text
                axios.post('api/kontak', {email, username, text}).then(response => {
                    let data = response.data
                    localStorage.setItem('jajanpasar.user', JSON.stringify(data.user))
                    localStorage.setItem('jajanpasar.jwt', data.token)
                    alert('Saran Anda telah kami terima, terima kasih!')
                })
			},
			setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('jajanpasar.user'))
					this.username = user.username
					this.email = user.email
                    this.user_type = user.is_admin
                }
            },
        } 
    }
</script>

