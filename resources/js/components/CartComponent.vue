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
                <a href="">x</a>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col text-center">
                <button class="btn btn-primary">Shop More</button>
            </div>
            <div class="col text-center">
                <button class="btn btn-success">Checkout</button>
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
