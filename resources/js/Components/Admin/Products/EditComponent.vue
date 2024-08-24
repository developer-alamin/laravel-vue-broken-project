
<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,product:Object});
	const getProduct = ()=>{
		return props.product;
	}
	$(document).ready( function () {
		$('#table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			}
		);
	});
	const form = useForm({
		id:getProduct().id,
		name:getProduct().name,
		price:getProduct().price,
		current:getProduct().current,
		img:getProduct().img,
		msg:getProduct().msg,
		file:''
	});
	const imgPreview = (event)=>{
		const img = document.querySelector(".customerimg");
       const file = event.target.files[0];
       form.file = file;
       img.src = URL.createObjectURL(file);

	}
	const update = ()=>{
		const btn = document.querySelector(".gradientBtn");
		router.post(route("product.update",form.id),{
			_method: 'put',
			form,
			onBefore:()=>{
				btn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
				btn.innerHTML = "Update";
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
			
			btn.innerHTML = "Update";
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
						<h4>{{form.name }} Product Update</h4>
						<img v-if="form.img" class="customerimg ms-auto" :src="form.img" alt="customer image">
						<img v-else='' class="customerimg ms-auto" src="../../../../../public/img/avater.jpg" alt="customer image">
					</div>
					<div class="card-body">
						<form @submit.prevent="update()">
							<div class="row">
								<div class="col-6">
									<label for="file">Photo:</label>
									<input  @input="imgPreview($event)" type="file" name="file" id="file" class="form-control">
								</div>
								<div class="col-6">
									<label for="name">Name:</label>
									<input v-model="form.name" type="text" name="name" id="name" class="form-control" placeholder="Product Name" >
								</div>
								<div class="col-6">
									<label for="price">Price:</label>
									<input v-model="form.price" type="number" name="price" id="price" class="form-control" placeholder="Product Price" >
								</div>
								<div class="col-6">
									<label for="C_price">Regular Price:</label>
									<input v-model="form.current" type="number" name="C_price" id="C_price" class="form-control" placeholder="Current Price" >
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