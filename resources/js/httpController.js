import Http from './http'
// import store from './store'
// import Cookie from 'js-cookie'
// import Session from 'vue-session'

export default {
    addProduk (nama, deskripsi, harga, tipe) {
        return new Promise((resolve, reject) => {
            const payload = {
                nama,
                deskripsi,
                harga,
                tipe
            }

            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.post('api/produk', payload, successCallback, errorCallback)
        })
    },

    getProduk () {
        return new Promise((resolve, reject) => {
    
            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.get('api/produk',successCallback, errorCallback)
        })
    },

    deleteProduk (id) {
        return new Promise((resolve, reject) => {
            // const payload = {
            //     id
            // }
            const successCallback = (res) => {
                // const produk = res.data
                console.log('test')
                resolve(res.data)
                
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.delete('api/produk/'+id,successCallback, errorCallback)
        })
    },

    addDiskon (nama_diskon, jumlah_diskon) {
        return new Promise((resolve, reject) => {
            const payload = {
                nama_diskon,
                jumlah_diskon
            }

            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.post('api/sale', payload, successCallback, errorCallback)
        })
    },

    getDiskon () {
        return new Promise((resolve, reject) => {
    
            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.get('api/sale',successCallback, errorCallback)
        })
    },

    deleteDiskon (id) {
        return new Promise((resolve, reject) => {
            // const payload = {
            //     id
            // }
            const successCallback = (res) => {
                // const produk = res.data
                console.log('test')
                resolve(res.data)
                
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.delete('api/sale/'+id,successCallback, errorCallback)
        })
    },

    getUser (id) {
        return new Promise((resolve, reject) => {
    
            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.get('api/users',successCallback, errorCallback)
        })
    },

    deleteUser (id) {
        return new Promise((resolve, reject) => {
            // const payload = {
            //     id
            // }
            const successCallback = (res) => {
                // const produk = res.data
                console.log('test')
                resolve(res.data)
                
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.delete('api/users/'+id,successCallback, errorCallback)
        })
    },
    addKeranjang (nama, deskripsi,harga) {
        return new Promise((resolve, reject) => {
            const payload = {
              
                nama,
                deskripsi,
                harga
                
            }

            const successCallback = (res) => {
                // const produk = res.data
                console.log('test')
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.post('api/transaksi', payload, successCallback, errorCallback)
        })
    },

    getTransaksi () {
        return new Promise((resolve, reject) => {
    
            const successCallback = (res) => {
                // const produk = res.data
                resolve(res.data)
            }

            const errorCallback = (err) => {
                reject(err)
            }


            Http.get('api/transaksi',successCallback, errorCallback)
        })
    },

    deleteTransaksi (id) {
        return new Promise((resolve, reject) => {
            // const payload = {
            //     id
            // }
            const successCallback = (res) => {
                // const produk = res.data
                console.log('test')
                resolve(res.data)
                
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.delete('api/transaksi/'+id,successCallback, errorCallback)
        })
    },

}

    

