<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import ShowComponent from '@/Components/Admin/Id/ShowComponent.vue';
    const props = defineProps({user:Object})
</script>
<template >
   <Head title="view id User Show"></Head>
   <AdminLayout>
       <ShowComponent :user="props.user"></ShowComponent> 
    </AdminLayout>
</template>

<style scoped>
    
</style>