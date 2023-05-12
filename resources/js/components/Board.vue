<script>
export default {
    props:[
        "authUserId",
        "user",
        "authUserName",
        "recipeIngredient",
    ],
    data() {
        return {
            recipes: [],
            comments: [],
            selectedCategory: "all",
            searchString:"",
        }
    },
    methods: {
        deleteRecipeParent(id) {
            this.recipes = this.recipes.filter(el => el.id != id);
        },

        
        getRecipes() {
            axios.get('/api/recipes?user_id=' + this.authUserId).then(response => {
                this.recipes = response.data;
            })
        },
    },
    mounted() {
        this.getRecipes();
    }
}

</script>

<template>
    <div class="container d-flex m-5">
        <select v-model="selectedCategory" class="form-select w-25 select">
            <option value="all">All</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <input v-model="searchString" style="width: 300px; margin-left: 5em;" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
        </button>
    </div>
<template>


</template>
    <div class="container">
        <div class="d-flex flex-wrap gap-5 justify-content-evenly">
            <div v-for="recipe in recipes">
                <recipe v-if="(selectedCategory === recipe.difficulty || selectedCategory === 'all') &&
                (recipe.name.toLowerCase().startsWith(searchString.toLowerCase()) ||
                recipe.description.toLowerCase().startsWith(searchString.toLowerCase()) || 
                authUserName.toLowerCase().startsWith(searchString.toLowerCase()))"
                    :name="recipe.name" 
                    :description="recipe.description" 
                    :image="recipe.image" 
                    :servings="recipe.servings" 
                    :prep_time="recipe.prep_time" 
                    :cook_time="recipe.cook_time" 
                    :total_time="recipe.total_time" 
                    :difficulty="recipe.difficulty" 
                    :authUserId="authUserId"
                    :authUserName ="authUserName"
                    :liked = "recipe.liked"
                    :id="recipe.id"
                    :user_id="recipe.user_id"
                    :recipeIngredient = "recipeIngredient"
                    :comments="recipe.comments"
                    :user="recipe.user"
                    @delete-recipe="deleteRecipeParent">
                </recipe>
            </div>
        </div>
    </div>
</template>

<style>

</style>

