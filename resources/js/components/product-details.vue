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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1"><span class="Cwhite"></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2"> <span class="Cblue"></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3"> <span class="Cred"></span></label>
                    </div>
                </div>

                <br>

                <div class="size-selector">
                    <p>Select Size : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio11" value="option1">
                        <label class="form-check-label" for="inlineRadio11">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio22" value="option2">
                        <label class="form-check-label" for="inlineRadio22">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio33" value="option3" disabled>
                        <label class="form-check-label" for="inlineRadio33">L</label>
                    </div>
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
export default {
    name : "product-details",
    props: ['propSingleItem'],
    data(){
        return{
            item: this.propSingleItem,
            quantity: 1,
            selectedColor: "",
            selectedSize: ""
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
        addToCart(){
            this.$emit('add-to-cart', this.propSingleItem.id);

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
