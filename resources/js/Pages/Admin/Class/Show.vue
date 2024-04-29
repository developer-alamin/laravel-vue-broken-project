<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import ShowClassComponent from '@/Components/Admin/Class/ShowClassComponent.vue';
    const props = defineProps({classUsers:Object})
</script>
<template >
   <Head title="Class Users Show Page"></Head>
   <AdminLayout>
      <ShowClassComponent :classUsers="props.classUsers"></ShowClassComponent>
    </AdminLayout>
</template>

<style scoped>
    
</style>