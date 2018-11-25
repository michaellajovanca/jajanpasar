<template>
    <div>
        <a href="index.php">
            <img class = "main-logo" src="./components/aset/aset-main-logo.png" alt="Logo jajanpasar.com">
        </a>
        <nav>
            <ul>
                <li><router-link :to="{name: 'beranda'}" class="navbar-brand"><b>Beranda</b></router-link></li>
                <li><a style="color:#db214c;font-size:13pt; padding-top:6px"><b>Pengguna</b></a>
                    <ul>
                        <li><router-link :to="{name: 'profile'}" class="navbar-brand" v-if="isLoggedIn"><b>My Profile</b></router-link></li>
                        <li><router-link :to="{name: 'daftar'}" class="navbar-brand" v-if="!isLoggedIn"><b>Daftar</b></router-link></li>
                        <li><router-link :to="{name: 'login'}" class="navbar-brand" v-if="!isLoggedIn"><b>Login</b></router-link></li>
                        <li style="color:#db214c;font-size:13pt; padding-right:35px" v-if="isLoggedIn" @click="logout"><b>Logout</b></li>
                    </ul>
                </li>
                <li><a style="color:#db214c;font-size:13pt; padding-top:6.5px"><b>Produk</b></a>
                    <ul>
                      <li><router-link :to="{name: 'makanan'}" class="navbar-brand" style="padding-left:30px"><b>Makanan</b></router-link></li>
                      <li><router-link :to="{name: 'minuman'}" class="navbar-brand" style="padding-left:30px"><b>Minuman</b></router-link></li>
                    </ul>
                </li>
                <li><router-link :to="{name: 'kontak'}" class="navbar-brand"><b>Kontak</b></router-link></li>
                <li><router-link :to="{name: 'tentang'}" class="navbar-brand"><b>Tentang</b></router-link></li>
                <li><router-link :to="{name: 'admin'}" class="navbar-brand" v-if="user_type == 1 && isLoggedIn"><b>Admin</b></router-link></li>
                <!--ini logo keranjang-->
                 <router-link :to="{name: 'transaksi'}" class="navbar-brand" v-if="user_type == 0 && isLoggedIn">
                    <img class = "chart" src="./components/aset/aset-keranjang.jpg" alt="Keranjang Belanja">             
                 </router-link>
                  <span v-if="isLoggedIn">
                    <li><router-link :to="{ name: 'profile' }" class="navbar-brand hi" v-if="user_type == 0"><b> Hi, {{name}}</b></router-link></li>
                    <li><router-link :to="{ name: 'admin' }" class="navbar-brand hi" v-if="user_type == 1"><b> Hi, {{name}}</b></router-link></li>
                </span>
            </ul>			
	    </nav> 
        <!--ini footer-->
        <main class="py-4">
                <router-view @loggedIn="change"></router-view>
        </main> 
        <br><br><br><br><br>
        <div class="footer"><br/>
            <p>Copyright 2018 | jajanpasar.com</p>
        </div>
    </div> 
</template>

<style>
/* Untuk Background*/
body {
    background-image: url("./components/aset/aset-background.jpg"); 
	background-size: cover;
	background-position: fixed;
	background-repeat: repeat;
	font-family: "Century Gothic", Times, serif;
}

/* Untuk header */
nav {
	float:right;
	text-align: center;
	padding-right: 200px;
}

nav ul ul {
	display: none;
}

	nav ul li:hover > ul {
		display: block;
	}

.hi{
    color: blueviolet;
}

nav ul {
	padding: 0 px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;
}
	nav ul:after {
		content: ""; clear: both; display: block;
	}

	nav ul li {
		float: left;
	}
		nav ul li:hover {
			border-bottom: 3px solid #db214c;
		}
			nav ul li:hover a {
				color: #db214c;
			}
		
		nav ul li a {
			display: block; padding: 15px 30px;
			color: #db214c; text-decoration: none;
		}
			
		
	nav ul ul {
		padding: 0;
		position: absolute; top: 100%;
	}
		nav ul ul li {
			float: none; 
			 position: relative;
		}
			nav ul ul li a {
				padding: 10px 40px;
				color: #db214c;
            }

/* Untuk Logo*/
.chart {
	width:30px;
	float : right;
	padding-top:3px;
	padding-right: 0px;
}

.main-logo {
	width:110px;
	float : left;
	padding-left: 25px;
	padding-top:25px;
}

/* Untuk Footer*/
.footer {
    position: fixed;
    left: 0;
	bottom: 0;
	width: 100%;
	background-color: #db214c;
	color: white;
	text-align: center;
	font-size : 15px; 
}

	            	   
</style>

<script>
    export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('jajanpasar.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('jajanpasar.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('jajanpasar.jwt') != null
                this.setDefaults()
            },
            logout(){
                alert('Anda telah logout');
                localStorage.removeItem('jajanpasar.jwt')
                localStorage.removeItem('jajanpasar.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>