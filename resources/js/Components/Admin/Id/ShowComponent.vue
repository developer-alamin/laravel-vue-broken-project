<script setup>
    import {Link} from '@inertiajs/vue3';
    import moment from "moment";

    const props = defineProps({user:Object})
</script>
<template>
    <article>
        <div class="row">
            <div class="col-12 col-sm-7 col-md-5 col-lg-4 m-auto">
                <div class="card">
                    <img v-if="props.user.profile.img" class="viewIdShowUserImg" :src="props.user.profile.img" alt="">
                    <img v-else class="viewIdShowUserImg" src="../../../../../public/img/avater.jpg" alt="">
                    <div class="card-footer">
                        <Link :href="route('Admin.View.Id.Page')" class="btn btn-outline-primary form-control">Back</Link>
                    </div>
                </div>
            </div> 
           
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="container">
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Name</b>
                            </div>
                            <div class="col-9">
                                <b>{{ props.user.name }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Email</b>
                            </div>
                            <div class="col-9">
                                <b>{{ props.user.email }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Role</b>
                            </div>
                            <div class="col-9">
                                <b>{{ props.user.role }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Gender</b>
                            </div>
                            <div class="col-9">
                                <b>{{ props.user.profile.gerder }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Date Of Birth</b>
                            </div>
                            <div class="col-9">
                                <b>{{ props.user.profile.date }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Created</b>
                            </div>
                            <div class="col-9">
                                <b>{{ moment(props.user.profile.created_at).format("DD-MM-yy")  }}</b>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center ">
                            <div class="col-3">
                                <b>Updated</b>
                            </div>
                            <div class="col-9">
                                <b>{{ moment(props.user.profile.updated_at).format("DD-MM-yy") }}</b>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div> 
            
        </div>
    </article>
</template>

<style scoped>
    img.viewIdShowUserImg{
        height:300px;
    }
</style>