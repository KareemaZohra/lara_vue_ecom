<template>
    <div class="quantity-toggle">
        <button @click="decrement()">&mdash;</button>
        <input type="text" :value="quantity" readonly class="QInput">
        <button @click="increment()">&#xff0b;</button>
    </div>
</template>

<script>

export default {
    name : "quantity-input",
    props:['propQty'],
    data(){
        return{
            quantity: this.propQty
        }
    },
    methods:{
        sendQuantity(){
            this.$emit('qty-updated',this.quantity);
        },
        increment () {
            this.quantity++
        },
        decrement () {
            if(this.quantity === 1) {
                alert('Negative quantity not allowed')
            } else {
                this.quantity--
            }
        }
    }

}
</script>

<style scoped>
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
</style>
