<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import ViewClassComponent from '@/Components/Admin/Class/ViewClassComponent.vue';
    const props = defineProps({classData:Object})
</script>
<template >
   <Head title="Class View Page"></Head>
   <AdminLayout>
      <ViewClassComponent :classData="props.classData"></ViewClassComponent>
    </AdminLayout>
</template>

<style scoped>
    
</style>