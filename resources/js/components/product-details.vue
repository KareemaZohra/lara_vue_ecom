<template>
    <div class="container">
        <div class="col-md-6 img-holder">
            <img src="/img/tshirt.jpeg" alt="sample t-shirt" class="img-fluid">
        </div>
        <div class="col-md-6 item-details">

        </div>
    </div>
</template>

<script>
export default {
    name : "product-details",
    data(){
        return{
            imgUrl : 'public/img/tshirt.jpeg'
        }
    },

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
