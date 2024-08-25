<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import moment from 'moment';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,data:Object});
	const getData = ()=>{
		return props.data;
	}

	const form = useForm({
		id:[]
	});
	
	$(document).ready( function () {
		$('#table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			}
		);
	});

	onMounted(()=>{
		

	});
	const allcheck =()=>{

		let check = document.querySelectorAll(".check");
		check.forEach((item,i)=>{
			if (item.checked) {
				item.checked = false;
				form.id = [];
			}else {
				item.checked = true;
				form.id[i] = item.value;
			}
		})
	}
	const status = (id)=>{
		return (id == 1) ? "Active" : "Deactive";
	}
	const UpdateItemDel = ()=>{
        Swal.fire({
            title: "Are you sure?",
            text: "Your Daily Invoice Deleted ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
            if (result.isConfirmed) {
                form.delete(route("Product.Update.Item.Delete"),{
                    preserveScroll: true,
                    onSuccess:()=>{
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your Data has been deleted.",
                            icon: "success"
                        });
                        form.id = [];
                    },
                    onError:()=>{
                        Toastify({
                            text: "Delete Faild",
                            gravity: "bottom",
                            position: "center",
                            className: "error",
                            style: {
                                background: "linear-gradient(to right, #ff0e11, #b91a1a)",
                            }
                        }).showToast();
                    }
                });
            }
        });
    }
    
</script>
<template>
	<article>
		<div class="row">
			<div class="col-12 pb-2">
				<div class="d-flex align-items-center">
				  <img  class="mr-3" :src="getData().product.img">
				  <div class="media-body ms-3">
				   	 <div>
				   	 	<b class="mt-0">Price: </b>
				   	 	<span>{{ getData().product.price }}</span>
				   	 </div>
				   	 <div>
				   	 	<b class="mt-0">Regualar Price: </b>
				   	 	<span>{{ getData().product.current }}</span>
				   	 </div>
				  </div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4> {{ getData().product.name }} Update List </h4>
						
						<Link :href="route('product.index')" class="btn gradientBtn ms-auto">View Product</Link>
					</div>
					<div class="card-body">
						
						<table id="table" class="table table-bordered table-hover table-striped">

							<thead>
								<tr>
									<th>#
									<input type="checkbox" class="allcheck" name="allcheck" @click="allcheck()">
									</th>
									<th>Sr</th>
									<th>Price</th>
									<th>Regular Price</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getData()['update']">
									<td>
										<input v-model="form.id" type="checkbox" class="check" name="check" :value="data.id">
									</td>
									<td>{{i+1}}</td>
									<td>{{data.price }}</td>
										
									<td>{{data.current }}</td>

									<td>{{ moment(data.created_at).format("LLL") }}</td>
									<td>
										<p :class="status(data.status).toLowerCase()">{{status(data.status)}}</p>
									</td>
									
								</tr>
							</tbody>
							<tfoot v-if="form.id.length > 0">
						    <tr>
						      <td>
						      	<button @click="UpdateItemDel()" class="btn btn-outline-danger form-control"><i class="fas fa-trash"></i></button>
						      </td>
						    </tr>
						  </tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>
<style scoped>
	img{
		width: 100px;
		height:100px;
	}
</style>