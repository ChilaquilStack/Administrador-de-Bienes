<template>
	<div>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<caption>
				<h1>Créditos Fiscales
					<button class="btn btn-primary btn-sm" @click="agregar_credito()">
						<i class="fa fa-plus"></i>Agregar
					</button>
				</h1>
			</caption>
	    	<thead>
	    		<th>Credito Fiscal</th>
	    		<th>Documento Determinante</th>
	    		<th>Origen del Credito</th>
	    		<th>Adeudo</th>
	    		<th>Contribuyente</th>
	    		<th>Bienes</th>
	    		<th>Opciones</th>
	    	</thead>
	    	<tbody>
	    		<tr v-for="credito in creditos">
	    			<td>{{credito.folio}}</td>
	    			<td>{{credito.documento_determinante}}</td>
	    			<td>{{credito.origen_credito}}</td>
	    			<td>${{credito.monto}}</td>
	    			<td>{{credito.contribuyentes_id}}</td>
    				<td>
    					<div class="btn-group">
    						<button class="btn btn-success btn-sm">
    							<i class="fa fa-eye"></i>Ver
    						</button>
		    				<button class="btn btn-primary btn-sm" @click="agregar_bien()">
		    					<i class="fa fa-plus"></i>Agregar
		    				</button>
    					</div>
    				</td>
	    			<td>
	    				<div class="btn-group">
		    				<button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Editar</button>
		    				<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</button>
	    				</div>
	    			</td>
	    		</tr>
	    	</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		props: ['creditos'],
		methods: {
			agregar_credito() {
				$("#agregar_credito").modal();
			},
		}
	}
</script>

<style>
	th{
		text-align: center !important;
	}
	td{
		text-align: center;
	}
</style>