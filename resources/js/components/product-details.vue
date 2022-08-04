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
            item: this.propSingleItem
        }
    },
    methods:{

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
</style>
