
<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,customers:Object});
	const getCustomers = ()=>{
		return props.customers;
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
		id:'',
		taka:'',
		notes:'',
		img:''
	});

	const pick = (id)=>{
		console.log(id)
		let radio = document.querySelectorAll(".radio");
		radio.forEach(function(element, index) {
			if (element.value == id) {
				element.checked = true;
			}
		});

		const result = getCustomers().filter((data)=>{
			return data.id == id;
		});
		form.id = result[0].id;
		form.img = result[0].avatar;
	}
	const create = ()=>{
		const createBtn = document.querySelector(".gradientBtn");
		form.post(route("invoice.store"),{
			preserveScroll: true,
			onBefore:()=>{
				createBtn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
				Swal.fire({
					title: "Success!",
					text: "Your Invoice Created Success !",
					icon: "success"
				});
				form.reset();
				let radio = document.querySelectorAll(".radio");
				radio.forEach(function(items) {
					items.checked = false;
				})
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
			<div class="col-7">
				<div class="card">
					<div class="card-header">
						<h5>All Customers List</h5>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getCustomers()">
									<td>
										<input @input="pick(data.id)" type="radio" class="radio" name="radio" :value="data.id" >
									</td>
									<td>{{data.name}}</td>
									<td>
										<img v-if="data.avatar" :src="data.avatar" class="customerimg" alt="">
										<img v-else='' class="customerimg" src="../../../../../public/img/avater.jpg" alt="">
									</td>
									<td>
										<button @click="pick(data.id)" class="btn form-control gradientBtn">{{ form.id == data.id ? "Picked":"Pick"}}</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-5">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h5>New Invoice</h5>
						<img v-if="form.img" class="customerimg ms-auto" :src="form.img" alt="customer image">
						<img v-else='' class="customerimg ms-auto" src="../../../../../public/img/avater.jpg" alt="customer image">
					</div>
					<div class="card-body">
						<form @submit.prevent="create()">
							<div class="row">
								<div class="col-12">
									<label for="taka">Taka</label>
									<input v-model="form.taka" type="number" name="taka" id="taka" class="form-control" placeholder="Please Taka.." required="">
								</div>
								<div class="col-12">
									<label for="note">Note:</label>
									 <ckeditor v-model="form.notes" :editor="ClassicEditor" ></ckeditor>
								</div>
								<div class="col-12 mt-3">
									<button v-if="form.id" type="submit" class="btn form-control gradientBtn" >Create</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>