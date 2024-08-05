<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import CustomerIndexComp from "@/Components/Admin/Customes/IndexComponent.vue";
	const props = defineProps({customers:Object});
</script>
<template>
	<Head title="Customer Index Page" />
    <AdminLayout>
       <CustomerIndexComp :customers="props.customers"></CustomerIndexComp>
    </AdminLayout>
	
</template>