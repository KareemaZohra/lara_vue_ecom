app.component('reviews-list',{
    template:
    /*html*/
    //reviews come from the prop-"reviews" passed while calling the component in product-display
    `<div class="reviews col-md-6">
        <ul v-for="(review,index) in reviews" :key="index">
            <li>
                {{review.name}} gave it {{review.rating}} star
                <br>
                "{{review.review}}"
            </li>
        </ul>
    </div>`,

    // since reviews are there in the parent component, we need props to bring it here
    props: {
        reviews: {
            type : Array,
            required : true
        }
    }
})