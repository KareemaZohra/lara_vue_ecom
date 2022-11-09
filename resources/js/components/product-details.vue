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
                    <div v-for="color in itemColors">
                        <input type="radio" id="color" name="color" v-model="selectedColor" :value="color" >
                        <label for="color">{{ color }}</label>
                    </div>
                </div>

                <br>

                <div class="size-selector">
                    <p>Select Size : </p>
                    <div v-for="size in itemSizes">
                        <input type="radio" id="size" name="size" v-model="selectedSize" :value="size" >
                        <label for="size">{{ size }}</label>
                    </div>
                </div>

                <br>

                <p>Select Quantity : </p>

                <quantity-input prop-qty="1" @qty-updated="qtyUpdated"></quantity-input>

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
    props: ['propSingleItem','propColors','propSizes'],
    data(){
        return{
            item: this.propSingleItem,
            itemColors : this.propColors,
            itemSizes : this.propSizes,
            quantity: 1,
            selectedColor: null,
            selectedSize: null
        }
    },
    methods:{
        onColorChanged(){
            selectedColor : this.selectedColor;
        },
        onSizeChanged(){
            selectedSize : this.selectedSize;
        },
        qtyUpdated(qty){
            this.quantity=qty;
        },
        addToCart(){
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
                    window.location.href='/cart';
                }).catch(err => {
                    console.log('error occured while adding to cart');
            })
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
    },
    created() {
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
