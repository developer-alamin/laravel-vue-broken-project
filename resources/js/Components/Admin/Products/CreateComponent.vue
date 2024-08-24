
<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,customers:Object});
	
	const form = useForm({
		file:'',
		name:'',
		price:'',
		current:'',
		msg:''
	});
	const imgPreview = (event)=>{
		const img = document.querySelector(".customerimg");
       const file = event.target.files[0];
       form.file = file;
       img.src = URL.createObjectURL(file);

	}
	const create = ()=>{
		const createBtn = document.querySelector(".createBtn");

		form.post(route("product.store"),{
			preserveScroll: true,
			onBefore:()=>{
				createBtn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
				Swal.fire({
					title: "Success!",
					text: "Your Product Created Success !",
					icon: "success"
				});
				form.reset();
				createBtn.innerHTML = "Save";
		   },
		   onError:()=>{
		   	Toastify({
	            text: "Submit Error",
	            gravity: "bottom",
	            position: "center",
	            className: "error",
	            style: {
	                background: "linear-gradient(to right, #ff0e11, #b91a1a)",
	            }
	        }).showToast();
			
			createBtn.innerHTML = "Save";
		   }
		})
	}
</script>
<template>
	<article>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Add New Product</h4>
						<img class="customerimg ms-auto" src="../../../../../public/img/pjs.png" accept="image/*">
					</div>
					<div class="card-body">
						<form @submit.prevent="create()">
							<div class="row">
								<div class="col-6">
									<label for="file">Photo:</label>
									<input  @input="imgPreview($event)" type="file" name="file" id="file" class="form-control" required="">
								</div>
								<div class="col-6">
									<label for="name">Name:</label>
									<input v-model="form.name" type="text" name="name" id="name" class="form-control" placeholder="Product Name" required="">
								</div>
								<div class="col-6">
									<label for="price">Price:</label>
									<input v-model="form.price" type="number" name="price" id="price" class="form-control" placeholder="Product Price" required="">
								</div>
								<div class="col-6">
									<label for="C_price">Regular Price:</label>
									<input v-model="form.current" type="number" name="C_price" id="C_price" class="form-control" placeholder="Current Price" required="">
								</div>
								<div class="col-12">
									<label for="note">Note:</label>
									<ckeditor v-model="form.msg" :editor="ClassicEditor" ></ckeditor>
								</div>
								<div class="col-12 mt-3">
									<button type="submit" class="btn form-control gradientBtn createBtn" >Create</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>