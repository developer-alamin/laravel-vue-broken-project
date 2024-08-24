<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import ProductShowComp from "@/Components/Admin/Products/ShowComponent.vue";
	const props = defineProps({data:Object});
</script>
<template>
	<Head title="Invoice Show Page" />
    <AdminLayout>
       <ProductShowComp :data="props.data"></ProductShowComp>
    </AdminLayout>
	
</template>