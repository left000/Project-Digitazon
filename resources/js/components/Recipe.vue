<script>
    export default {
        data(){
            return{
                likeState: this.liked,
                commentContent: "",
                commentsState: this.comments,
            }
        },
        props:[
            "id",
            "name",
            "description",
            "image",
            "servings",
            "prep_time",
            "cook_time",
            "total_time",
            "difficulty", 
            "user_id",
            "authUserId",
            "liked",
            "authUserName",
            "comments",
            "user"
        ],
        emits: [
            "delete-recipe",
        ],
        methods:{
            destroy(){
                axios.delete("api/recipes/"+ this.id).then(response =>{
                    this.$emit("delete-recipe", this.id);
                })
            },
            destroyComment(commentId){
                
                axios.delete("api/comments/"+ commentId).then(response =>{
                    if(response.data.success){
                        this.commentsState = this.commentsState.filter(el => el.id != commentId);
                    };
                })
            },
            like(){
                console.log(this.authUserId);
                axios.post('api/likes', {
                    user_id: this.authUserId,
                    recipe_id: this.id
                }).then(response =>{
                    if(response.data.success){
                        this.likeState = true;
                    }
                    
                })
            },
            dislike(){
                axios.post('api/dislike', {
                    user_id: this.authUserId,
                    recipe_id: this.id
                }).then(response => {
                    if(response.data.success){
                        this.likeState = false;
                    }
                })
                
            },
            addComment() {
                let newComment= {
                    recipe_id: this.id,
                    user_id: this.authUserId,
                    content: this.commentContent,
                }
                axios.post('api/comments', newComment).then(response => {
                    if (response.data.success) {
                        this.commentsState.push(response.data.comment);
                    }
                })
            },
            
        }
    }
</script>

<template>
    <div class="card" style="width: 30rem;">
        <div class="card-body ">
            <img class="card-img-top img-fluid"  :src="image" alt="image">
            <h5 class="card-title m-3 "><b>Nome: </b> {{ name }}</h5>
            <h5 class="card-title m-3 "><b>Descrizione: </b>  {{ description }}</h5>
            <h5 class="card-title m-3 "> <b>Porzioni: </b> {{ servings }}</h5>
            <h5 class="card-title m-3 "> <b>Tempo di preparazione: </b>  {{ prep_time }}</h5>
            <h5 class="card-title m-3 "> <b> Tempo di cucinare: </b> {{ cook_time }}</h5>
            <h5 class="card-title m-3 "> <b>Difficoltà: </b>  {{ difficulty }}</h5>
            <h5 class="card-title m-3"> <b>Tempo Totale: </b>  {{ total_time }}</h5>
            <h5 class="card-title m-3"> <b>Utente: </b>  {{ user.name }}</h5>
            <button class="btn btn-danger float-end m-1" @click="destroy">ELIMINARE</button>
            <a class="btn btn-primary float-end m-1" :href="'/instructions?id='+id " >INSTRUZIONI</a>
            <a class="btn btn-primary float-end m-1" :href="'/recipeIngredients?id='+id " >INGREDIENTI DELLA RICETTA</a>
            <button v-if="!likeState" @click="like" class="btn btn-primary float-start m-1">LIKE</button>
            <button v-else @click="dislike" class="btn btn-dark float-start">DISLIKE</button>
        </div>
        <div class="container">
            <input class="input-comment w-100 mb-2 form-control" type="text" v-model="commentContent">
            <button @click="addComment" class="btn btn-success mb-5 w-100">Aggiungi un Commento</button>
        </div>
        <div v-for="comment in commentsState">
            <div class="container">
                <div class="card mb-4">
                    <div class="card-body d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 30 30">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>  
                        <b><p>{{ comment.user.name }}</p></b>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <p class="comment">{{ comment.content.substr(0, 45) }}</p> 
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger float-end m-1" @click="destroyComment(comment.id)">ELIMINARE</button>
                </div>
            </div>
        </div>
        
    </div>
</template>

<style>
.comment{
    margin-left: 2em;
}

</style>

