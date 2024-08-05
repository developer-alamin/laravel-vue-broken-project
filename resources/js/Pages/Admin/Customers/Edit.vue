<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import CustomerEditComp from "@/Components/Admin/Customes/EditComponent.vue";
	const props = defineProps({customer:Object});
</script>
<template>
	<Head title="Customer Edit Page" />
    <AdminLayout>
       <CustomerEditComp :customer="props.customer"></CustomerEditComp>
    </AdminLayout>
	
</template>