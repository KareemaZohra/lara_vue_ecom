<template>
    <div class="container">
        <div class="row">
            <h2 class="text-center mb-5"><u>Checkout Page</u></h2>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">Product</div>
            <div class="col">Unit Price</div>
            <div class="col">Quantity</div>
            <div class="col">Price</div>
            <div class="col"></div>
        </div>
        <hr>
        <div class="row" v-for="item in cartItems">
            <div class="col">
                <img class="img-thumbnail demo-img" src="/img/noPhoto.jpg" alt="">
            </div>
            <div class="col">
                <p>{{ item.name }}</p>
                <p>
                    <span>{{ item.color }}</span> , <span>{{ item.size }}</span>
                </p>
            </div>
            <div class="col">
                <p>{{ item.price }}</p>
            </div>
            <div class="col">
               <quantity-input :prop-qty="item.quantity" @qty-updated="qtyUpdated($event,item.id,item.color,item.size)"></quantity-input>
            </div>
            <div class="col">
                <p>{{ item.price*item.quantity }}</p>
            </div>
            <div class="col">
                <a class="del" href="#" @click="deleteFromCart(item.id)">x</a>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <p>Total Price = {{ cartTotal }}</p>
                <hr>
            </div>
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
    props:['propCart','cartTotal'],
    data(){
        return{
            cartItems : this.propCart
        }
    },
    methods: {
        deleteFromCart(id){
            let url = '/cart/remove/'+id;
            axios.delete(url)
                .then(res => {
                    window.location.href='/checkout';
                }).catch(err => {
                console.log('deleting from cart failed');
            })
        },
        qtyUpdated(qty,itemId,itemColor,itemSize){
            // try checking qty available in variants table or not
            let url = '/cart/update/';
            let cartUpdatePayload = {
                id: itemId,
                quantity: qty,
                color: itemColor,
                size: itemSize
            };

            axios.put(url,cartUpdatePayload)
                .then(res => {
                   window.location.href='/checkout';
                }).catch(err => {
                    alert("Not enough stock !!");
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
.del{
    color: red;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid red;
    padding: 1px 5px;
}
</style>
