<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import ProductsIndexComp from "@/Components/Admin/Products/IndexComponent.vue";
	const props = defineProps({products:Object});
</script>
<template>
	<Head title="Products View Page" />
    <AdminLayout>
       <ProductsIndexComp :products="props.products"></ProductsIndexComp>
    </AdminLayout>
	
</template>