app.component('review-form',{
    template:
    /*html*/
    `<div class="col-md-6">
        <form class="review-form" @submit.prevent="onSubmit">
            <h3>Leave a review</h3>
            <label for="name">Name:</label>
            <input id="name" v-model="name">

            <label for="review">Review:</label>      
            <textarea id="review" v-model="review"></textarea>

            <label for="rating">Rating:</label>
            <select id="rating" v-model.number="rating">
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
            </select>

            <input class="button" type="submit" value="Submit">  
        </form>
    </div>`,

    data(){
        return{
            name : '',
            review : '',
            rating : null
        }
    },

    methods: {
        onSubmit(){
            // SingleReview is an object with a review
            let SingleReview = {
                name : this.name,
                review : this.review,
                rating : this.rating
            }

            // following name emits the info to productDetails.js file. review-submitted is the emitter name
            this.$emit('review-submitted', SingleReview);

            //following erases old review data
            this.name = '';
            this.review = '';
            this.rating = null;
        }
    }
})