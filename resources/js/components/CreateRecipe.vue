<script>
    export default {
        data(){
            return{
                name:"",
                description:"",
                image:"",
                servings:"",
                prep_time:"",
                cook_time:"",
                total_time:"",
                recipe: "",
                difficulty: "",
                difficulties: ["easy", "medium", "hard"],
                user_id: this.authUserId,
            }
        },
        props:[
            "authUserId",
            "user",
        ],
        methods: {
        createRecipe() {
            axios.post('/api/recipes', {
                name: this.name,
                description: this.description,
                image: this.image,
                servings: this.servings,
                prep_time: this.prep_time,
                cook_time: this.cook_time,
                total_time: this.total_time,
                difficulty: this.difficulty,
                user_id: this.authUserId,
            }).then((response) => {
                this.$emit('create-recipe', true),
                window.location.href = "http://localhost:8000/recipes";
            })
        }
    },
    mounted(){
        console.log(this.authUserId);
    },
    emits: [
        'create-recipe',
        'authUserId',
        'user'
    ]}
</script>
<template>
    
    <div id="create" class="container w-50 ">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" v-model="name" id="name" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" v-model="description" id="description">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label" >Image</label>
                <input type="text" class="form-control" v-model="image" id="image" placeholder="Insert link image">
            </div>
            <div class="mb-3">
                <label for="servings" class="form-label">Servings</label>
                <input type="number" class="form-control" v-model="servings" id="servings">
            </div>
            <div class="mb-3">
                <label for="prep_time" class="form-label">Prep Time</label>
                <input type="number" class="form-control" v-model="prep_time" id="prep_time">
            </div>
            <div class="mb-3">
                <label for="cook_time" class="form-label">Cook Time</label>
                <input type="number" class="form-control" v-model="cook_time" id="cook_time">
            </div>
            <div class="mb-3">
                <label for="total_time" class="form-label">Total Time</label>
                <input type="number" class="form-control" v-model="total_time" id="total_time">
            </div>
            <div class="mb-3">
                <label for="difficulty" class="form-label">Difficulty</label>
                <select class="form-control" id="difficulty" v-model="difficulty">
                    <option v-for="difficulty in difficulties" :value="difficulty">{{ difficulty }}</option>
                </select>
            </div>
            <button @click="createRecipe" type="submit"  class="btn btn-primary">Submit</button>
    </div>
</template>

<style>


</style>
