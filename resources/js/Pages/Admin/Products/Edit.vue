<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import ProductEditComp from "@/Components/Admin/Products/EditComponent.vue";
	const props = defineProps({product:Object});
</script>
<template>
	<Head title="Products Edit Page" />
    <AdminLayout>
       <ProductEditComp :product="props.product"></ProductEditComp>
    </AdminLayout>
	
</template>