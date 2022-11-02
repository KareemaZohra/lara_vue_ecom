<template>
    <div class="container">
        <div class="row">
            <h2 class="text-center mb-5"><u>Your Cart</u></h2>
        </div>
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
            <hr>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary" href="/all-product">Shop More</a>
            </div>
            <div class="col text-center">
                <a class="btn btn-success" href="/checkout">Checkout</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : "cart-view",
    props:['propCart'],
    data(){
        return{
            cartItems : this.propCart
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
