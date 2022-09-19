<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 img-holder">
                <img src="/img/tshirt.jpeg" alt="sample t-shirt" class="img-fluid">
            </div>
            <div class="col-md-6 item-details">
                <h2>{{ item.name }}</h2>
                <h3>Price : {{ item.price }}</h3>
                <p>
                    Stock :
                    <span class="green-text" v-if="item.available">available</span>
                    <span class="red-text" v-else>unavailable</span>
                </p>

                <br>

                <div class="color-selector">
                    <p>Select Color : </p>
                    <input type="radio" id="white" name="color" v-model="selectedColor" value="white" >
                    <label for="white">white</label>
                    <input type="radio" id="blue" name="color" v-model="selectedColor" value="blue" >
                    <label for="blue">blue</label>
                    <input type="radio" id="red" name="color" v-model="selectedColor" value="red" >
                    <label for="red">red</label>
                </div>

                <br>

                <div class="size-selector">
                    <p>Select Size : </p>
                    <input type="radio" id="small" name="size" v-model="selectedSize" value="small" >
                    <label for="small">S</label>
                    <input type="radio" id="medium" name="size" v-model="selectedSize" value="medium" >
                    <label for="medium">M</label>
                    <input type="radio" id="large" name="size" v-model="selectedSize" value="large" >
                    <label for="large">L</label>
                </div>

                <br>

                <p>Select Quantity : </p>
                <div class="quantity-toggle">
                    <button @click="decrement()">&mdash;</button>
                    <input type="text" :value="quantity" readonly class="QInput">
                    <button @click="increment()">&#xff0b;</button>
                </div>

                <br>
                <br>
                <button id="add2cart" v-on:click="addToCart" :disabled="!inStock" class="btn"
                        :class="[ item.available? 'activeBtn' : 'disabledButton' ]">
                    Add to cart
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name : "product-details",
    props: ['propSingleItem'],
    data(){
        return{
            item: this.propSingleItem,
            quantity: 1,
            selectedColor: null,
            selectedSize: null
        }
    },
    methods:{
        increment () {
            this.quantity++
        },
        decrement () {
            if(this.quantity === 1) {
                alert('Negative quantity not allowed')
            } else {
                this.quantity--
            }
        },
        onColorChanged(){
            selectedColor : this.selectedColor;
        },
        onSizeChanged(){
            selectedSize : this.selectedSize;
        },
        addToCart(){
            this.$emit('add-to-cart', this.propSingleItem.id);
            let addToCartRequestPayload = {
                itemId: this.propSingleItem.id,
                itemName: this.propSingleItem.name,
                itemColor: this.selectedColor,
                itemSize: this.selectedSize,
                itemPrice: this.propSingleItem.price,
                itemQty: this.quantity
            };
            let url = '/cart/add';

            axios.post(url,addToCartRequestPayload)
                .then(res => {
                    console.log();
                }).catch(err => {
                    console.log('error occured while adding to cart');
            })
            //console.log(addToCartRequestPayload);
            // window.location.href='/cart';
        }
    },
    computed: {
        inStock(){
            if(this.item.available){
                return true;
            }
            else{
                return false;
            }
        }
    }
}
</script>

<style scoped>
.img-holder{
    padding: 50px;
}
.item-details{
    padding: 50px;
}
.color-selector span{
    display: block;
    height: 10px;
    width: 20px;
    border: 1px solid black;
    margin: 0 10px;
}
.Cwhite{background-color: white}
.Cblue{background-color: blue}
.Cred{background-color: red}
pre {
    background: #eee;
    padding: 1rem;
    border-radius: 5px;
}
.quantity-toggle {
    display: flex;
}
.quantity-toggle input {
    border: 0;
    border-top: 2px solid #ddd;
    border-bottom: 2px solid #ddd;
    width: 2.5rem;
    text-align: center;
    padding: 0 .5rem;
}
.quantity-toggle button {
    border: 2px solid #ddd;
    padding: .5rem;
    background: #f5f5f5;
    color: #888;
    font-size: 1rem;
    cursor: pointer;
}
.activeBtn{
    background-color: #4cc780;
}
.disabledButton{
    background-color: gainsboro;
}
</style>
