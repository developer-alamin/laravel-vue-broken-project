<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({classUsers:Object})
    const getClassUsers = ()=>{
        return props.classUsers.users;
    }
</script>
<template>
    <article>
        <nav class="bg-white  " style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb pt-2 pb-2">
                    <li class="breadcrumb-item"><Link :href="route('Admin.Home.Page')">Home</Link></li>
                    <li class="breadcrumb-item"><Link :href="route('Admin.Class.View.Page')">Class</Link></li>
                    <li class="breadcrumb-item active" aria-current="page">{{props.classUsers.name}}</li>
                </ol>
            </div>
        </nav>
        <div class="row" v-if="getClassUsers().length > 0">
            <div class="col-6 col-md-3 col-lg-2" v-for="(data,i) in getClassUsers()" >
                <div class="card text-start">
                    <img class="card-img-top classUsersImg" src="http://127.0.0.1:8000/img/pjs.png" alt="Title" />
                    <div class="card-body pb-0">
                        <h5 class="text-center">{{data.name}}</h5>
                        <h5 class="text-center">{{data.name}}</h5>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row text-center" v-else>
           <h4 class="text-danger">Users Not Found</h4>
        </div>
    </article>
</template>

<style scoped>
    img.classUsersImg{
        height: 120px;
    }
</style>