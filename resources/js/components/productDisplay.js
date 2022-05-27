app.component('product-display',{
    //'product-display' is the component name

    template : 
    /*html*/
    `<div class="row">
    <div class="product-img col-md-6">
        <img :src="image">
    </div>
    <div class="col-md-6">
        <h1>{{ title }}</h1>
        <h4 class="inventory">
            <span v-if="inventory>10">In-stock</span>
            <span v-else-if="inventory<=10 && inventory>0">Almost stock-out</span>
            <span v-else>Stock-out</span>
        </h4>
        <p class="shipping">Shipping {{ shipping }}</p>
        <a :href="url">
            <p>{{ description }}</p>
        </a>
        <ul>
            <li v-for="detail in details">{{detail}}</li>
        </ul>
        
        <!-- <div class="color-variant" v-for="variant in variants" :key="variant.id"
         @mouseover="updateImage(variant.image)" :style="{'background-color': variant.color}"></div> -->

         <div class="color-variant" v-for="(variant, index) in variants" :key="variant.id"
         @mouseover="updatevariant(index)" :style="{'background-color': variant.color}"></div>

        <!-- <button id="add2cart" class="btn btn-primary" v-on:click="addToCart" :disabled="!inStock"
         :class="{ disabledButton : !inStock }">
            Add to cart
        </button> -->

        <button id="add2cart" v-on:click="addToCart" :disabled="!inStock"
         :class="[ inStock? 'activeBtn' : 'disabledButton' ]">
            Add to cart
        </button>
    </div>
    <reviews-list :reviews="reviews"></reviews-list>
    <review-form @review-submitted="reviewListing"></review-form>
</div>`,

data() {
    return{
        brand : 'Nike',
        product : 'Socks',
        description : 'Comfortable light-weight summer socks',
        //image: './assets/christmas-sock.jpg',
        url : 'https://www.facebook.com',
        inventory: 8,
        details : ['50% cotton','30% wool','20% polyester'],
        variants : [
            {id : 221, color : 'red', image: 'assets/christmas-sock.jpg', quantity : 30},
            {id : 112, color : 'green', image: 'assets/green-sock.jpg', quantity : 0}
        ],
        // variants is an array of objects
        //inStock : false,
        selectedVariant: 0,
        reviews: []
    }
},
methods: {
    addToCart(){
        this.$emit('add-to-cart', this.variants[this.selectedVariant].id)
        // this points to the cart key of data section.
    },
    updateImage(varImage){
        this.image=varImage;
    },
    updatevariant(index){
        // here index is loop index; 0,1,2... etc
        this.selectedVariant=index;
    },
    reviewListing(singleReview){
        this.reviews.push(singleReview);
    }
    //since reviewListing is an emitter , it shoudld emit to parent. here product-display component is the parent
},
computed: {
    title(){
        return this.brand+' '+this.product;
    },
    image() {
        return this.variants[this.selectedVariant].image
    },
    inStock(){
        if(this.variants[this.selectedVariant].quantity>0){
            return true;
        }
        else{
            return false;
        }
    },
    shipping(){
        if(this.premium){
            return 'Free!'
        }
            return '$2.99'
    }
},
props: {
    premium:{
        type: Boolean,
        required: true
    }
}

})