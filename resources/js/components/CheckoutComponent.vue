<template>
    <div class="container">
        <div class="row" v-for="item in cartItems">
            <div class="col">
                <img class="img-thumbnail demo-img" src="/img/noPhoto.jpg" alt="">
            </div>
            <div class="col">
                <p>{{ item.name }}</p>
                <p>
                    <spann>{{ item.color }}</spann> , <span>{{ item.size }}</span>
                </p>
            </div>
            <div class="col">
                <p>{{ item.price }}</p>
            </div>
            <div class="col">
                <p>{{ item.quantity }}</p>
            </div>
            <div class="col">
                <a href="#" @click="deleteFromCart(item.id)">x</a>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-success" href="#">Place Order</a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name : "checkout-page",
    props:['propCart'],
    data(){
        return{
            cartItems : this.propCart
        }
    },
    methods:{
        deleteFromCart(id){
            let url = '/cart/remove/'+id;
            axios.delete(url)
                .then(res => {
                    window.location.href='/checkout';
                }).catch(err => {
                console.log('deleting from cart failed');
            })
        }
    }

}
</script>

<style scoped>
.container{
    margin-top: 100px;
}
.demo-img{
    height: 100px;
    width: 100px;
}
</style>
