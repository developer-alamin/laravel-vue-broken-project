<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import { reactive,ref} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object});
	const form = useForm({
		file:'',
	    name: null,
	    customer_id:'',
	    phone:'',
	    email:'',
	    village:'',
	    nationals:'',
	    father:'',
	    mother:'',
	    password:'',
	    mobile:'',
	    mail:''
	});
	const imgPreview = (event)=>{
		const customerimg = document.querySelector(".customerimg");
       const file = event.target.files[0];
       form.file = file;
       customerimg.src = URL.createObjectURL(file);
	}

	const create = ()=>{
		const createBtn = document.querySelector(".createBtn");

		form.post(route("customers.store"),{
			preserveScroll: true,
			onBefore:()=>{
				createBtn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
				Swal.fire({
					title: "Success!",
					text: "Your Taka Created Success !",
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
						<h4>New Customers</h4>
						<img class="customerimg ms-auto" src="../../../../../public/img/pjs.png" accept="image/*" alt="customer image">
					</div>
					<div class="card-body">
						<form @submit.prevent="create()">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="file">Photo:</label>
									<input @input="imgPreview($event)" type="file" name="file" id="file" class="form-control" required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="name">Name:</label>
									<input v-model="form.name" type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name.." required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="customer_id">Customer Id:</label>
									<input v-model="form.customer_id" type="text" name="customer_id" id="customer_id" class="form-control" placeholder="Enter Customer Id.." required="">
									<span v-if="page.props.errors.customer_id" class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ page.props.errors.customer_id }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="phone">Phone:</label>
									<input v-model="form.phone" type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone.." required="">
									<span v-if="page.props.errors.phone" class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ page.props.errors.phone }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="email">Email:</label>
									<input v-model="form.email" type="email" name="email" id="email" class="form-control" placeholder="Enter Email.." required="">
									<span v-if="page.props.errors.email" class="text-danger"><i class="fa fa-exclamation-circle"></i> {{ page.props.errors.email }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label  for="village">Village:</label>
									<input v-model="form.village" type="text" name="village" id="village" class="form-control" placeholder="Enter Village.." required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="nationals">National Number:</label>
									<input v-model="form.nationals" type="text" name="nationals" id="nationals" class="form-control" placeholder="Enter National Number.." required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="father">Father:</label>
									<input v-model="form.father" type="text" name="father" id="father" class="form-control" placeholder="Enter Father Name.." required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="mother">Mother:</label>
									<input v-model="form.mother" type="text" name="mother" id="mother" class="form-control" placeholder="Enter Mother Name.." required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4">
									<label for="password">Password:</label>
									<input v-model="form.password" type="password" name="password" id="password" class="form-control" required="">
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4">
									<input v-model="form.mobile" type="checkbox" name="mobile" id="mobile"> 
									<label for="mobile" class="ms-1">
										Are You Mobile Send SMS:
									</label>
									
								</div>
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-4">
									<input v-model="form.mail" type="checkbox" name="mail" id="mail"> 
									<label for="mail" class="ms-1">
										Are You Email Send SMS:
									</label>
									
								</div>
								<div class="col-12 mt-3">
									<button type="submit" class="btn btn-outline-primary form-control createBtn">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>
