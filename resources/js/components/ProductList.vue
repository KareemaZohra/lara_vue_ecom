<template>
    <div class="container" id="collection-group">
        <div class="row">
            <div class="col-md-3 item-card" v-for="item in items">
                <a href="#" v-on:click="goToItem($event, item.id)">
                    <div>{{item.name}}</div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : "product-list",
    props: ['propItem'],
    data(){
        return{
            items: this.propItem
        }
    },
    methods:{

        goToItem(event,id) {
            let itemLink = '/product/'+id;
            window.location.href = itemLink;
        }
    }
}
</script>

<style scoped>

#collection-group .item-card>a>div{
    height: 100px;
    padding: 50px;
    background-color: gainsboro;
    margin: 50px 0;
    border-radius: 15px;
    text-align: center;
}
</style>
